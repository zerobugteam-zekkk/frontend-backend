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

    #chat-box {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 0;
    }

    #chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 16px;
        background: #f8fafc;
        min-height: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
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

    #send-btn {
        background: #2563eb;
        color: white;
        border: none;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        cursor: pointer;
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

    .typing span:nth-child(1) {
        animation-delay: -0.32s;
    }

    .typing span:nth-child(2) {
        animation-delay: -0.16s;
    }

    @keyframes bounce {

        0%,
        80%,
        100% {
            transform: scale(0);
        }

        40% {
            transform: scale(1);
        }
    }

    @media (max-width: 640px) {
        #chat-window {
            right: 12px;
            bottom: 90px;
            width: calc(100vw - 24px);
            max-width: 380px;
            height: 65vh;
            border-radius: 20px;
        }

        #chat-toggle {
            bottom: 16px;
            right: 16px;
        }
    }
</style>

<button id="chat-toggle"><i class="fas fa-comments"></i></button>

{{-- UI Chatbot --}}
<div id="chat-window">

    {{-- Header --}}
    <div
        style="background:#2563eb;color:white;padding:16px;display:flex;justify-content:space-between;align-items:center">
        <div style="display:flex;gap:10px;align-items:center">
            <i class="fas fa-robot"></i>
            <div>
                <strong style="font-size:13px">{{ __('messages.chatbot.title') }}</strong><br>
                <small style="font-size:10px;opacity:.9">{{ __('messages.chatbot.status') }}</small>
            </div>
        </div>
        <button id="open-end-chat-modal" style="background:none;border:none;color:white;cursor:pointer;font-size:16px;">
            <i class="fas fa-times"></i>
        </button>
    </div>

    {{-- REGISTER --}}
    <div id="chat-register" class="p-5 flex-1 space-y-2">
        <h3 class="font-bold text-lg mb-2">{{ __('messages.chatbot.register.title') }}</h3>

        <div>
            <input id="first_name" placeholder="{{ __('messages.chatbot.register.first_name') }}"
                class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring">
            <small id="err_first_name" class="text-red-500 text-xs hidden"></small>
        </div>
        <div>
            <input id="last_name" placeholder="{{ __('messages.chatbot.register.last_name') }}"
                class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring">
            <small id="err_last_name" class="text-red-500 text-xs hidden"></small>
        </div>
        <div>
            <input id="email" placeholder="{{ __('messages.chatbot.register.email') }}"
                class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring">
            <small id="err_email" class="text-red-500 text-xs hidden"></small>
        </div>
        <div>
            <input id="mobile" placeholder="{{ __('messages.chatbot.register.mobile') }}" type="tel"
                inputmode="numeric" pattern="[0-9]*"
                class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring">
            <small id="err_mobile" class="text-red-500 text-xs hidden"></small>
        </div>
        <div>
            <select id="category" class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring">
                <option value="">{{ __('messages.chatbot.register.category_none') }}</option>
                <option value="information">{{ __('messages.chatbot.register.category_information') }}</option>
                <option value="complaint">{{ __('messages.chatbot.register.category_complaint') }}</option>
                <option value="suggestion">{{ __('messages.chatbot.register.category_suggestion') }}</option>
                <option value="appreciation">{{ __('messages.chatbot.register.category_appreciation') }}</option>
            </select>
            <small id="err_category" class="text-red-500 text-xs hidden"></small>
        </div>

        <button id="register-btn"
            class="w-full py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition">
            {{ __('messages.chatbot.register.start') }}
        </button>
    </div>

    {{-- CHAT --}}
    <div id="chat-box" style="display:none;flex-direction:column;">
        <div id="chat-messages"></div>
        <div id="chat-input-area">
            <input id="chat-input" placeholder="{{ __('messages.chatbot.chat.placeholder') }}"
                style="flex:1;padding:10px;border-radius:999px;border:1px solid #ddd">
            <button id="send-btn"
                style="background:#2563eb;color:white;border:none;width:42px;height:42px;border-radius:50%;cursor:pointer;">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    {{-- END CHAT MODAL --}}
    <div id="end-chat-modal"
        style="
        display:none;
        position:absolute;
        inset:0;
        background:rgba(0,0,0,.45);
        z-index:9999;
        align-items:center;
        justify-content:center;
        backdrop-filter:blur(4px);">

        <div
            style="background:white;width:320px;border-radius:16px;padding:20px;text-align:center;box-shadow:0 20px 40px rgba(0,0,0,.2);">
            <div style="font-size:40px;margin-bottom:10px;">✈️</div>
            <h3 style="margin:0 0 10px;font-size:18px;font-weight:700;">
                {{ __('messages.chatbot.end_chat.title') }}
            </h3>
            <p style="font-size:14px;color:#64748b;margin-bottom:20px;">
                {{ __('messages.chatbot.end_chat.message') }}
            </p>
            <div style="display:flex;gap:10px;justify-content:center;">
                <button id="cancel-end-chat"
                    style="padding:10px 18px;border:none;border-radius:10px;background:#e2e8f0;cursor:pointer;">
                    {{ __('messages.chatbot.end_chat.no') }}
                </button>
                <button id="confirm-end-chat"
                    style="padding:10px 18px;border:none;border-radius:10px;background:#2563eb;color:white;cursor:pointer;">
                    {{ __('messages.chatbot.end_chat.yes') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // ⚠️ PENTING: karena route sekarang di web.php,
        // semua POST request wajib kirim CSRF token
        // const CSRF = '{{ csrf_token() }}';
        const LOCALE = '{{ app()->getLocale() }}';

        const toggle = document.getElementById('chat-toggle');
        const windowChat = document.getElementById('chat-window');
        const modal = document.getElementById('end-chat-modal');
        const cancelBtn = document.getElementById('cancel-end-chat');
        const confirmBtn = document.getElementById('confirm-end-chat');
        const openBtn = document.getElementById('open-end-chat-modal');
        const registerBox = document.getElementById('chat-register');
        const chatBox = document.getElementById('chat-box');
        const input = document.getElementById('chat-input');
        const send = document.getElementById('send-btn');
        const messages = document.getElementById('chat-messages');

        // header default untuk semua request
        function headers() {
            return {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                // 'X-CSRF-TOKEN':  CSRF,  // wajib karena route ada di web.php
            };
        }

        // =========================
        // TOGGLE BUKA / TUTUP
        // =========================
        toggle.onclick = () => windowChat.classList.toggle('active');

        // =========================
        // TAMBAH BUBBLE PESAN
        // =========================
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

        // =========================
        // AUTO CEK SESSION (PING)
        // =========================
        fetch('/api/chat', {
                method: 'POST',
                credentials: 'include',
                headers: headers(),
                body: JSON.stringify({
                    message: 'ping',
                    locale: LOCALE
                })
            })
            .then(res => {
                if (!res.ok) {
                    // session tidak ada / expired → tampilkan register
                    registerBox.style.display = 'block';
                    chatBox.style.display = 'none';
                    return null;
                }
                registerBox.style.display = 'none';
                chatBox.style.display = 'flex';
                return res.json();
            })
            .then(data => {
                if (!data) return;

                const greeting = LOCALE === 'en' ?
                    `Hello ${data.first_name} 👋 Please continue chatting ✈️` :
                    `Halo ${data.first_name} 👋 Silakan lanjutkan chat ✈️`;

                addMessage(greeting, 'bot');

                if (data.history && data.history.length > 0) {
                    data.history.forEach(msg => addMessage(msg.message, msg.sender));
                }
            })
            .catch(() => {
                registerBox.style.display = 'block';
                chatBox.style.display = 'none';
            });

        // =========================
        // REGISTER
        // =========================
        document.getElementById('register-btn').onclick = async function() {
            const btn = this;

            const fields = [{
                    id: 'first_name',
                    label: '{{ __('messages.chatbot.register.first_name') }}'
                },
                {
                    id: 'last_name',
                    label: '{{ __('messages.chatbot.register.last_name') }}'
                },
                {
                    id: 'email',
                    label: '{{ __('messages.chatbot.register.email') }}'
                },
                {
                    id: 'mobile',
                    label: '{{ __('messages.chatbot.register.mobile') }}'
                },
            ];

            const REQUIRED_MSG = '{{ app()->getLocale() === 'en' ? 'is required' : 'wajib diisi' }}';
            const GMAIL_MSG =
                '{{ app()->getLocale() === 'en' ? 'Email must use @gmail.com' : 'Email harus menggunakan @gmail.com' }}';
            const PHONE_MSG =
                '{{ app()->getLocale() === 'en' ? 'Phone number must contain numbers only.' : 'Nomor HP hanya boleh berisi angka.' }}';

            // reset semua error
            fields.forEach(f => {
                document.getElementById(f.id).classList.remove('border-red-500');
                document.getElementById('err_' + f.id).classList.add('hidden');
            });

            // validasi
            for (const field of fields) {
                const el = document.getElementById(field.id);
                const err = document.getElementById('err_' + field.id);

                el.classList.remove('border-red-500');
                err.classList.add('hidden');

                if (!el.value.trim()) {
                    el.classList.add('border-red-500');
                    err.innerText = `${field.label} ${REQUIRED_MSG}`;
                    err.classList.remove('hidden');
                    el.focus();
                    return;
                }

                if (field.id === 'email' && !el.value.trim().endsWith('@gmail.com')) {
                    el.classList.add('border-red-500');
                    err.innerText = GMAIL_MSG;
                    err.classList.remove('hidden');
                    el.focus();
                    return;
                }

                if (field.id === 'mobile' && !/^[0-9]+$/.test(el.value.trim())) {
                    el.classList.add('border-red-500');
                    err.innerText = PHONE_MSG;
                    err.classList.remove('hidden');
                    el.focus();
                    return;
                }
            }

            // loading button
            btn.disabled = true;
            btn.innerHTML = `<svg class="animate-spin h-5 w-5 mx-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>`;
            btn.classList.add('opacity-60');

            try {
                const res = await fetch('/api/chat/register', {
                    method: 'POST',
                    credentials: 'include',
                    headers: headers(),
                    body: JSON.stringify({
                        first_name: document.getElementById('first_name').value,
                        last_name: document.getElementById('last_name').value,
                        email: document.getElementById('email').value,
                        mobile: document.getElementById('mobile').value,
                        category: document.getElementById('category').value,
                    })
                });

                const data = await res.json();

                if (!res.ok) {
                    btn.disabled = false;
                    btn.classList.remove('opacity-60');
                    btn.innerText = '{{ __('messages.chatbot.register.start') }}';

                    const firstKey = Object.keys(data.errors)[0];
                    const el = document.getElementById(firstKey);
                    const err = document.getElementById('err_' + firstKey);
                    el.classList.add('border-red-500');
                    err.innerText = data.errors[firstKey][0];
                    err.classList.remove('hidden');
                    el.focus();
                    return;
                }

                registerBox.style.display = 'none';
                chatBox.style.display = 'flex';

                const greeting = LOCALE === 'en' ?
                    `Hello ${data.first_name} 👋 Please start chatting ✈️` :
                    `Halo ${data.first_name} 👋 Silakan mulai chat ✈️`;

                addMessage(greeting, 'bot');

            } catch (e) {
                btn.disabled = false;
                btn.classList.remove('opacity-60');
                btn.innerText = '{{ __('messages.chatbot.register.start') }}';
                alert('Server error. Silakan coba lagi.');
            }
        };

        // =========================
        // KIRIM PESAN
        // =========================
        async function sendMessage() {
            const text = input.value.trim();
            if (!text) return;

            addMessage(text, 'user');
            input.value = '';

            showTyping();

            try {
                const res = await fetch('/api/chat', {
                    method: 'POST',
                    credentials: 'include',
                    headers: headers(),
                    body: JSON.stringify({
                        message: text,
                        locale: LOCALE
                    })
                });

                removeTyping();

                if (res.status === 401) {
                    chatBox.style.display = 'none';
                    registerBox.style.display = 'block';
                    messages.innerHTML = '';
                    return;
                }

                const data = await res.json();
                addMessage(data.reply ?? 'AI tidak mengirim balasan', 'bot');

            } catch (e) {
                removeTyping();
                addMessage('Gagal mengirim pesan. Coba lagi.', 'bot');
            }
        }

        send.onclick = sendMessage;
        input.addEventListener('keydown', e => {
            if (e.key === 'Enter') sendMessage();
        });

        // =========================
        // AKHIRI PERCAKAPAN (LOGOUT)
        // session dihapus di server → tidak perlu reload
        // =========================

        async function endChat() {
            try {
                await fetch('/api/chat/logout', {
                    method: 'POST',
                    credentials: 'include',
                    headers: headers()
                });
            } catch (e) {
                console.error('Logout error', e);
            }

            // ✅ Hapus cookie via JS (karena httpOnly: false)
            document.cookie = 'chat_user_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

            // ✅ Reset UI — TANPA location.reload()
            chatBox.style.display = 'none';
            registerBox.style.display = 'block';
            messages.innerHTML = '';
            modal.style.display = 'none';

            ['first_name', 'last_name', 'email', 'mobile', 'category'].forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = '';
                    el.classList.remove('border-red-500');
                }
                const err = document.getElementById('err_' + id);
                if (err) {
                    err.classList.add('hidden');
                    err.innerText = '';
                }
            });

            // ✅ Reset button register
            const btn = document.getElementById('register-btn');
            btn.disabled = false;
            btn.innerHTML = '{{ __('messages.chatbot.register.start') }}';
            btn.classList.remove('opacity-60');
        }

        // =========================
        // TYPING ANIMATION
        // =========================
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
            const el = document.getElementById('typing-indicator');
            if (el) el.remove();
        }

        // =========================
        // EVENT LISTENER MODAL
        // =========================
        openBtn.addEventListener('click', () => modal.style.display = 'flex');
        cancelBtn.addEventListener('click', () => modal.style.display = 'none');
        confirmBtn.addEventListener('click', () => endChat());

    });
</script>
