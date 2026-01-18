<!-- CHATBOT -->
<style>
    #chat-toggle {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        border: none;
        font-size: 22px;
        cursor: pointer;
        z-index: 9999;
    }

    #chat-window {
        position: fixed;
        bottom: 100px;
        right: 24px;
        width: 320px;
        height: 420px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,.15);
        display: none;
        flex-direction: column;
        z-index: 9999;
        overflow: hidden;
        font-family: sans-serif;
    }

    #chat-window.show {
        display: flex;
    }

    .chat-header {
        background: #2563eb;
        color: white;
        padding: 14px;
        display: flex;
        justify-content: space-between;
        font-weight: bold;
    }

    .chat-messages {
        flex: 1;
        padding: 14px;
        overflow-y: auto;
        font-size: 14px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background: #f8fafc;
    }

    .chat-bot {
        background: #e2e8f0;
        padding: 10px 14px;
        border-radius: 14px;
        max-width: 80%;
        align-self: flex-start;
    }

    .chat-user {
        background: #2563eb;
        color: white;
        padding: 10px 14px;
        border-radius: 14px;
        max-width: 80%;
        align-self: flex-end;
    }

    .chat-input {
        display: flex;
        padding: 12px;
        border-top: 1px solid #e5e7eb;
        background: white;
    }

    .chat-input input {
        flex: 1;
        padding: 10px;
        border-radius: 999px;
        border: 1px solid #e5e7eb;
        outline: none;
        font-size: 14px;
    }

    .chat-input button {
        margin-left: 8px;
        background: #2563eb;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

<button id="chat-toggle">💬</button>

<div id="chat-window">
    <div class="chat-header">
        <span>MLG Assistant</span>
        <button id="chat-close">✕</button>
    </div>

    <div id="chat-messages" class="chat-messages">
        <div class="chat-bot">
            Halo 👋 Saya asisten Bandara Abdurachman Saleh.
        </div>
    </div>

    <div class="chat-input">
        <input id="chat-input" placeholder="Tanya jadwal penerbangan..." />
        <button id="chat-send">➤</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('chat-toggle');
        const windowChat = document.getElementById('chat-window');
        const close = document.getElementById('chat-close');
        const input = document.getElementById('chat-input');
        const send = document.getElementById('chat-send');
        const messages = document.getElementById('chat-messages');

        toggle.onclick = () => windowChat.classList.toggle('show');
        close.onclick = () => windowChat.classList.remove('show');

        function addMessage(text, type) {
            const div = document.createElement('div');
            div.className = type === 'user' ? 'chat-user' : 'chat-bot';
            div.innerText = text;
            messages.appendChild(div);
            messages.scrollTop = messages.scrollHeight;
        }

        async function sendMessage() {
            const text = input.value.trim();
            if (!text) return;

            addMessage(text, 'user');
            input.value = '';

            try {
                const res = await fetch('/api/chat', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: text })
                });

                const data = await res.json();
                addMessage(data.reply || 'Tidak ada respon.', 'bot');
            } catch {
                addMessage('Sistem sedang bermasalah.', 'bot');
            }
        }

        send.onclick = sendMessage;
        input.addEventListener('keydown', e => {
            if (e.key === 'Enter') sendMessage();
        });
    });
</script>
<!-- END CHATBOT -->
