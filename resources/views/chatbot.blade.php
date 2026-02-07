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
    box-shadow: 0 15px 35px rgba(0,0,0,.2);
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
    box-shadow: 0 25px 60px rgba(0,0,0,.18);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 9999;

    opacity: 0;
    transform: translateY(20px) scale(.95);
    pointer-events: none;
    transition: all .3s cubic-bezier(.175,.885,.32,1.275);
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
</style>

<!-- TOGGLE -->
<button id="chat-toggle">
    <i class="fas fa-comments"></i>
</button>

<!-- WINDOW -->
<div id="chat-window">

    <!-- HEADER -->
    <div style="background:#2563eb;color:white;padding:16px;display:flex;justify-content:space-between;align-items:center">
        <div style="display:flex;gap:10px;align-items:center">
            <i class="fas fa-robot"></i>
            <div>
                <strong style="font-size:13px">
                    {{ __('messages.chatbot.title') }}
                </strong><br>
                <small style="font-size:10px;opacity:.9">
                    {{ __('messages.chatbot.status') }}
                </small>
            </div>
        </div>
        <button id="chat-close" style="background:none;border:none;color:white;font-size:18px;cursor:pointer">✕</button>
    </div>

    <!-- REGISTER -->
    <div id="chat-register" style="padding:20px;flex:1">
        <h3 style="margin-bottom:10px">
            {{ __('messages.chatbot.register.title') }}
        </h3>
        <p style="font-size:13px;color:#555;margin-bottom:14px">
            {{ __('messages.chatbot.register.desc') }}
        </p>

        <input id="first_name" placeholder=
        "{{ __('messages.chatbot.register.first_name') }}"
        style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="last_name" placeholder=
        "{{ __('messages.chatbot.register.last_name') }}"
         style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="email" placeholder=
        "{{ __('messages.chatbot.register.email') }}"
         style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">
        <input id="mobile" placeholder=
        "{{ __('messages.chatbot.register.mobile') }}"
         style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:8px">

        <select id="category" style="width:100%;padding:12px;border-radius:12px;border:1px solid #ddd;margin-bottom:14px">
                    <option>{{ __('messages.chatbot.register.category_none') }}</option>
                    <option>{{ __('messages.chatbot.register.category_information') }}</option>
                    <option>{{ __('messages.chatbot.register.category_complaint') }}</option>
                    <option>{{ __('messages.chatbot.register.category_suggestion') }}</option>
                    <option>{{ __('messages.chatbot.register.category_appreciation') }}</option>
        </select>

        <button id="register-btn" style="width:100%;padding:14px;background:#2563eb;color:white;border:none;border-radius:14px;font-weight:bold">
            {{ __('messages.chatbot.register.start') }}
        </button>
    </div>

    <!-- CHAT -->
    <div id="chat-box" style="display:none;flex-direction:column;height:100%">
        <div id="chat-messages"></div>

        <div style="padding:12px;border-top:1px solid #eee;background:white;display:flex;gap:8px">
            <input id="chat-input" placeholder="{{ __('messages.chatbot.chat.placeholder') }}" style="flex:1;padding:10px;border-radius:999px;border:1px solid #ddd">
            <button id="send-btn" style="background:#2563eb;color:white;border:none;width:42px;height:42px;border-radius:50%">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let userId = null;

    const toggle = document.getElementById('chat-toggle');
    const windowChat = document.getElementById('chat-window');
    const close = document.getElementById('chat-close');

    const registerBox = document.getElementById('chat-register');
    const chatBox = document.getElementById('chat-box');

    const input = document.getElementById('chat-input');
    const send = document.getElementById('send-btn');
    const messages = document.getElementById('chat-messages');

    toggle.onclick = () => windowChat.classList.toggle('active');
    close.onclick = () => windowChat.classList.remove('active');

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

        if (type === 'user') {
            bubble.style.background = '#2563eb';
            bubble.style.color = 'white';
        } else {
            bubble.style.background = 'white';
            bubble.style.border = '1px solid #e5e7eb';
        }

        div.appendChild(bubble);
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

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

        try {
            const res = await fetch('/api/chat/register', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            userId = data.user_id;

            registerBox.style.display = 'none';
            chatBox.style.display = 'flex';

            addMessage(
                `{!! __('messages.chatbot.chat.greeting', ['name' => '${payload.first_name}']) !!}`,'bot');
        } catch {
            alert(`{!! __('messages.chatbot.chat.error') !!}`,'bot');
        }
    };

    async function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        addMessage(text, 'user');
        input.value = '';

        try {
            const res = await fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    user_id: userId,
                    message: text
                })
            });
            const data = await res.json();
            addMessage(data.reply ?? `{!! __('messages.chatbot.chat.error') !!}`, 'bot');
        } catch {
            addMessage(`{!! __('messages.chatbot.chat.no_reply') !!}`, 'bot');
        }
    }

    send.onclick = sendMessage;
    input.addEventListener('keydown', e => {
        if (e.key === 'Enter') sendMessage();
    });
});
</script>
