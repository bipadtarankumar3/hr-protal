<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login | RYDZAA HRMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
    --bg: #070b16;
    --panel: rgba(15,20,45,0.9);
    --text: #ffffff;
    --muted: rgba(255,255,255,0.55);
    --accent1: #f48ea2;
    --accent2: #cf002a;
}

.light {
    --bg: #f5f7fc;
    --panel: rgba(255,255,255,0.95);
    --text: #1e2433;
    --muted: #5c6170;
}

* {
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background: var(--bg);
    color: var(--text);
    overflow: hidden;
}

/* ===== Animated Background ===== */
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background:
        radial-gradient(circle at 20% 20%, rgba(106,139,255,0.22), transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(143,107,255,0.22), transparent 45%),
        linear-gradient(120deg, var(--bg), #0e1430, var(--bg));
    background-size: 300% 300%;
    animation: bgMove 18s ease infinite;
    z-index: -2;
}

@keyframes bgMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== Layout ===== */
.login-container {
    display: grid;
    grid-template-columns: 1.3fr 0.7fr;
    min-height: 100vh;
}

/* ===== Hero Panel ===== */
.login-visual {
    position: relative;
    background: url('{{ asset('public/admin-assets/img/backgrounds/bg.jpg') }}') center/cover no-repeat;
    transition: transform 0.12s ease;
}

.login-visual::after {
    content: "";
    position: absolute;
    inset: 0;
    background:
        linear-gradient(120deg, rgba(7,11,22,0.85), rgba(14,20,48,0.55));
}

.visual-content {
    position: relative;
    z-index: 2;
    padding: 5rem;
    max-width: 520px;
}

.visual-content h1 {
    font-size: 2.8rem;
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: 1rem;
}

.visual-content span {
    background: linear-gradient(90deg, var(--accent1), var(--accent2));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.visual-content p {
    font-size: 1.05rem;
    opacity: 0.85;
}

/* ===== Login Panel ===== */
.login-panel {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.login-card {
    width: 100%;
    max-width: 420px;
    padding: 2.6rem;
    border-radius: 1.6rem;
    background: var(--panel);
    backdrop-filter: blur(18px);
    box-shadow: 0 30px 80px rgba(0,0,0,0.45);
    animation: fadeUp 0.8s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Header Controls ===== */
.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.2rem;
    font-size: 0.85rem;
}

.top-bar span {
    cursor: pointer;
    opacity: 0.8;
}

/* ===== Titles ===== */
.login-card h3 {
    margin: 0;
    font-size: 1.55rem;
    font-weight: 700;
}

.login-card small {
    opacity: 0.65;
}

/* ===== Inputs ===== */
.field {
    position: relative;
    margin-top: 1.8rem;
}

.field input {
    width: 100%;
    padding: 0.95rem;
    border-radius: 0.95rem;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.18);
    color: var(--text);
    font-size: 0.95rem;
}

.field label {
    position: absolute;
    top: 50%;
    left: 16px;
    transform: translateY(-50%);
    font-size: 0.8rem;
    color: var(--muted);
    pointer-events: none;
    transition: 0.25s;
}

.field input:focus,
.field input:not(:placeholder-shown) {
    border-color: var(--accent1);
}

.field input:focus + label,
.field input:not(:placeholder-shown) + label {
    top: -9px;
    background: var(--panel);
    padding: 0 6px;
    font-size: 0.65rem;
    color: var(--accent2);
}

/* ===== Password Toggle ===== */
.toggle-pass {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.8rem;
    cursor: pointer;
    opacity: 0.7;
}

/* ===== Button ===== */
.login-btn {
    margin-top: 2.4rem;
    width: 100%;
    padding: 0.95rem;
    border-radius: 3rem;
    border: none;
    font-weight: 600;
    color: #fff;
    background: linear-gradient(90deg, var(--accent1), var(--accent2));
    cursor: pointer;
    transition: 0.3s ease;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 40px rgba(106,139,255,0.45);
}

/* ===== Footer ===== */
.footer {
    margin-top: 1.6rem;
    text-align: center;
    font-size: 0.75rem;
    opacity: 0.6;
}

/* ===== Mobile ===== */
@media (max-width: 992px) {
    .login-container {
        grid-template-columns: 1fr;
    }
    .login-visual {
        display: none;
    }
}
</style>
</head>

<body>

<div class="login-container">

    <!-- HERO -->
    <div class="login-visual" id="parallax">
        <div class="visual-content">
            <h1>Welcome to <span>RYDZAA HRMS</span></h1>
            <p>
                A unified enterprise platform for hiring, payroll,
                attendance, compliance, and workforce intelligence.
            </p>
        </div>
    </div>

    <!-- LOGIN -->
    <div class="login-panel">
        <div class="login-card">

            <div class="top-bar">
                <span id="roleSwitch">Admin Login</span>
                {{-- <span id="themeToggle">🌙</span> --}}
            </div>

            <h3 id="loginTitle">Secure Login</h3>
            <small>Access your dashboard</small>

            <form>
                <div class="field">
                    <input type="email" placeholder=" " />
                    <label>Email Address</label>
                </div>

                <div class="field">
                    <input type="password" id="password" placeholder=" " />
                    <label>Password</label>
                    <span class="toggle-pass" onclick="togglePass()">👁</span>
                </div>

                <a href="{{URL::to('/admin/')}}">
                    <button type="button" class="login-btn">
                    Login
                </button>
                </a>
                
            </form>

            <div class="footer">
                © {{ date('Y') }} RYDZAA India Mobility Pvt Ltd
            </div>

        </div>
    </div>

</div>

<script>
/* Theme toggle */
document.getElementById('themeToggle').onclick = () => {
    document.body.classList.toggle('light');
};

/* Password visibility */
function togglePass() {
    const p = document.getElementById('password');
    p.type = p.type === 'password' ? 'text' : 'password';
}

/* Role switch */
let admin = true;
document.getElementById('roleSwitch').onclick = () => {
    admin = !admin;
    document.getElementById('loginTitle').innerText =
        admin ? 'Secure Login' : 'Employee Login';
    document.getElementById('roleSwitch').innerText =
        admin ? 'Admin Login' : 'Employee Login';
};

/* Parallax effect */
document.addEventListener('mousemove', e => {
    const el = document.getElementById('parallax');
    if (!el) return;
    const x = (e.clientX / window.innerWidth - 0.5) * 8;
    const y = (e.clientY / window.innerHeight - 0.5) * 8;
    el.style.transform = `translate(${x}px, ${y}px) scale(1.03)`;
});
</script>

</body>
</html>
