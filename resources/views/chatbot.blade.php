<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    #chat-toggle {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        border: none;
        font-size: 22px;
        cursor: pointer;
        z-index: 9999;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .2);
        transition: all .3s;
    }

    #chat-toggle:hover {
        transform: scale(1.1) rotate(5deg);
    }

    #chat-window {
        position: fixed;
        bottom: 110px;
        right: 24px;
        width: 380px;
        height: 550px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, .18);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        z-index: 9999;
        opacity: 0;
        transform: translateY(20px) scale(.95);
        pointer-events: none;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    #chat-window.active {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    #chat-messages {
        flex: 1;
        padding: 16px;
        background: #f8fafc;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    #chat-box {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 0;   /* INI PENTING */
    }

    #chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 16px;
        background: #f8fafc;
        min-height: 0;   /* INI PENTING */
    }

    #chat-input {
    flex: 1;
    padding: 10px;
    border-radius: 999px;
    border: 1px solid #ddd;
}

    #chat-input-area {
        display: flex;
    gap: 8px;
    padding: 12px;
    border-top: 1px solid #eee;
    background: white;
    flex-shrink: 0;
    }

    .typing {
    display: flex;
    gap: 6px;
    align-items: center;
    padding: 10px 14px;
    background: white;
    border-radius: 18px;
    border: 1px solid #e5e7eb;
    width: fit-content;
}

.typing span {
    width: 6px;
    height: 6px;
    background: #999;
    border-radius: 50%;
    animation: bounce 1.4s infinite ease-in-out both;
}

#send-btn {
    background: #2563eb;
    color: white;
    border: none;
    width: 42px;
    height: 42px;
    border-radius: 50%;
}

.typing span:nth-child(1) { animation-delay: -0.32s; }
.typing span:nth-child(2) { animation-delay: -0.16s; }

@keyframes bounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

</style>

<button id="chat-toggle"><i class="fas fa-comments"></i></button>

<div id="chat-window">
    <div
        style="background:#2563eb;color:white;padding:16px;display:flex;justify-content:space-between;align-items:center">
        <div style="display:flex;gap:10px;align-items:center">
            <i class="fas fa-robot"></i>
            <div>
                <strong style="font-size:13px">{{ __('messages.chatbot.title') }}</strong><br>
                <small style="font-size:10px;opacity:.9">{{ __('messages.chatbot.status') }}</small>
            </div>
        </div>
        <button id="chat-logout" style="background:none;border:none;color:white;font-size:14px;cursor:pointer">
            Logout
        </button>
    </div>

    <!-- REGISTER -->
    <div id="chat-register" style="padding:20px;flex:1">
        <h3>{{ __('messages.chatbot.register.title') }}</h3>

        <input id="first_name" placeholder="First Name"
            style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="last_name" placeholder="Last Name"
            style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="email" placeholder="Email"
            style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="mobile" placeholder="Mobile"
            style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">

        <select id="category"
            style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:14px">
            <option value="">Pilih Kategori</option>
            <option value="information">Informasi</option>
            <option value="complaint">Komplain</option>
            <option value="suggestion">Saran</option>
            <option value="appreciation">Apresiasi</option>
        </select>

        <button id="register-btn"
            style="width:100%;padding:14px;background:#2563eb;color:white;border:none;border-radius:14px;font-weight:bold">
            Mulai Chat
        </button>
    </div>

    <!-- CHAT -->
    <div id="chat-box" style="display:none;flex-direction:column;">
        <div id="chat-messages"></div>
        <div id="chat-input-area">

            <input id="chat-input" placeholder="Ketik pesan..."
                style="flex:1;padding:10px;border-radius:999px;border:1px solid #ddd">
            <button id="send-btn"
                style="background:#2563eb;color:white;border:none;width:42px;height:42px;border-radius:50%">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const toggle = document.getElementById('chat-toggle');
        const windowChat = document.getElementById('chat-window');
        const logoutBtn = document.getElementById('chat-logout');
        const registerBox = document.getElementById('chat-register');
        const chatBox = document.getElementById('chat-box');
        const input = document.getElementById('chat-input');
        const send = document.getElementById('send-btn');
        const messages = document.getElementById('chat-messages');

        toggle.onclick = () => windowChat.classList.toggle('active');

        function addMessage(text, type) {
            const div = document.createElement('div');
            div.style.display = 'flex';
            div.style.justifyContent = type === 'user' ? 'flex-end' : 'flex-start';

            const bubble = document.createElement('div');
            bubble.innerHTML = text;
            bubble.style.maxWidth = '80%';
            bubble.style.padding = '10px 14px';
            bubble.style.borderRadius = '18px';
            bubble.style.fontSize = '14px';
            bubble.style.background = type === 'user' ? '#2563eb' : 'white';
            bubble.style.color = type === 'user' ? 'white' : 'black';

            if (type !== 'user') bubble.style.border = '1px solid #e5e7eb';

            div.appendChild(bubble);
            messages.appendChild(div);
            messages.scrollTop = messages.scrollHeight;
        }

        // 🔥 AUTO CEK SESSION
        fetch('/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                message: "ping"
            })
        }).then(res => {

            if (res.status === 401) {
                registerBox.style.display = 'block';
                chatBox.style.display = 'none';
                return;
            }

            registerBox.style.display = 'none';
            chatBox.style.display = 'flex';
            addMessage('Halo! Silakan tanyakan jadwal penerbangan ✈️', 'bot');

        });

        // REGISTER
        document.getElementById('register-btn').onclick = async () => {

            const payload = {
                first_name: first_name.value,
                last_name: last_name.value,
                email: email.value,
                mobile: mobile.value,
                category: category.value
            };

            if (!payload.first_name || !payload.email) {
                alert('Nama dan email wajib diisi');
                return;
            }

            const res = await fetch('/api/chat/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            if (res.ok) {
                registerBox.style.display = 'none';
                chatBox.style.display = 'flex';
                addMessage(`Halo <b>${payload.first_name}</b>! Silakan tanyakan jadwal penerbangan ✈️`,
                    'bot');
            }
        };

        async function sendMessage() {

            const text = input.value.trim();
            if (!text) return;

            addMessage(text, 'user');
            input.value = '';

            showTyping(); // 🔥 tampilkan animasi

            const res = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    message: text
                })
            });

            removeTyping(); // 🔥 hilangkan animasi

            if (res.status === 401) {
                chatBox.style.display = 'none';
                registerBox.style.display = 'block';
                messages.innerHTML = '';
                return;
            }

            const data = await res.json();
            addMessage(data.reply ?? 'AI tidak mengirim balasan', 'bot');
        }

        send.onclick = sendMessage;
        input.addEventListener('keydown', e => {
            if (e.key === 'Enter') sendMessage();
        });

        // LOGOUT
        logoutBtn.onclick = async () => {

            await fetch('/api/chat/logout', {
                method: 'POST'
            });

            chatBox.style.display = 'none';
            registerBox.style.display = 'block';
            messages.innerHTML = '';
            windowChat.classList.remove('active');
        };

        // animation
        function showTyping() {
    const div = document.createElement('div');
    div.id = 'typing-indicator';
    div.style.display = 'flex';
    div.style.justifyContent = 'flex-start';

    const bubble = document.createElement('div');
    bubble.className = 'typing';
    bubble.innerHTML = '<span></span><span></span><span></span>';

    div.appendChild(bubble);
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
}

function removeTyping() {
    const typing = document.getElementById('typing-indicator');
    if (typing) typing.remove();
}

    });
</script>
