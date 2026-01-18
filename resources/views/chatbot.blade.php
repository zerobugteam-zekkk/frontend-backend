<!-- CSS -->
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

{{-- HTML --}}
<!-- CHAT TOGGLE -->
<button id="chat-toggle"
    class="fixed bottom-6 right-6 w-16 h-16 bg-blue-600 text-white rounded-full shadow-xl z-[100]">
    <i class="fas fa-comment-dots text-2xl"></i>
</button>

<!-- CHAT WINDOW -->
<div id="chat-window"
    class="fixed bottom-24 right-6 w-[360px] h-[520px] bg-white rounded-2xl shadow-2xl z-[100] hidden flex-col">

    <!-- HEADER -->
    <div class="bg-blue-600 text-white p-4 flex justify-between">
        <span class="text-xs font-bold">MLG Assistant</span>
        <button id="close-chat">✕</button>
    </div>

    <!-- REGISTER -->
    <div id="chat-register" class="p-4 space-y-3">
        <input id="first_name" placeholder="First Name" class="w-full border p-2 rounded">
        <input id="last_name" placeholder="Last Name" class="w-full border p-2 rounded">
        <input id="email" placeholder="Email" class="w-full border p-2 rounded">
        <input id="mobile" placeholder="Mobile" class="w-full border p-2 rounded">
        <select id="category" class="w-full border p-2 rounded">
            <option>--None--</option>
            <option>INFORMASI</option>
            <option>KELUHAN</option>
            <option>SARAN</option>
            <option>PERMINTAAN / PERMOHONAN</option>
            <option>APRESIASI</option>
        </select>
        <button id="register-btn"
            class="w-full bg-blue-600 text-white p-2 rounded">
            Mulai Chat
        </button>
    </div>

    <!-- CHAT -->
    <div id="chat-box" class="hidden flex-col h-full">
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50"></div>
        <div class="p-3 flex gap-2 border-t">
            <input id="chat-input" class="flex-1 border rounded-full px-4 py-2"
                placeholder="Tanya jadwal penerbangan...">
            <button id="send-btn"
                class="bg-blue-600 text-white px-4 rounded-full">
                Kirim
            </button>
        </div>
    </div>
</div>

{{-- CHATBOT SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    let userId = null;

    const toggle   = document.getElementById('chat-toggle');
    const windowChat = document.getElementById('chat-window');
    const close    = document.getElementById('close-chat');

    const registerBox = document.getElementById('chat-register');
    const chatBox  = document.getElementById('chat-box');

    const input    = document.getElementById('chat-input');
    const send     = document.getElementById('send-btn');
    const messages = document.getElementById('chat-messages');

    // SAFETY CHECK
    if (!toggle || !windowChat) return;

    // TOGGLE
    toggle.onclick = () => windowChat.classList.toggle('show');
    close.onclick  = () => windowChat.classList.remove('show');

    // ADD MESSAGE
    function addMessage(text, type) {
        const div = document.createElement('div');
        div.className = type === 'user'
            ? 'flex justify-end'
            : 'flex justify-start';

        div.innerHTML = `
            <span class="max-w-[80%] px-4 py-2 rounded-xl text-sm
            ${type === 'user'
                ? 'bg-blue-600 text-white'
                : 'bg-white border'}">
                ${text}
            </span>
        `;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    // REGISTER
    document.getElementById('register-btn').onclick = async () => {
        const payload = {
            first_name: document.getElementById('first_name').value,
            last_name : document.getElementById('last_name').value,
            email     : document.getElementById('email').value,
            mobile    : document.getElementById('mobile').value,
            category  : document.getElementById('category').value,
        };

        try {
            const res = await fetch('/api/chat/register', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const data = await res.json();

            if (!data.user_id) {
                alert('Registrasi gagal');
                return;
            }

            userId = data.user_id;
            registerBox.classList.add('hidden');
            chatBox.classList.remove('hidden');

            addMessage('Halo! Silakan tanyakan jadwal penerbangan ✈️', 'bot');
        } catch {
            alert('Server error saat registrasi');
        }
    };

    // SEND MESSAGE
    async function sendMessage() {
        const text = input.value.trim();
        if (!text || !userId) return;

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
