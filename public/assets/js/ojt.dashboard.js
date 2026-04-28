/* ── Live Date & Time ──────────────────────────────── */
function updateDatetime() {
    const el = document.getElementById('currentDatetime');
    const now = new Date();
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const day = days[now.getDay()];
    const month = months[now.getMonth()];
    const date = String(now.getDate()).padStart(2, '0');
    const year = now.getFullYear();
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12;
    el.textContent = `${day}, ${month} ${date}, ${year}  ${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
}
updateDatetime();
setInterval(updateDatetime, 1000);

/* ── Clock In / Out Toggle ─────────────────────────── */
let isClockedIn = false;
function toggleClock() {
    const btn = document.getElementById('clockBtn');
    isClockedIn = !isClockedIn;
    if (isClockedIn) {
        btn.textContent = 'Clock Out';
        btn.classList.remove('clock-in');
        btn.classList.add('clock-out');
    } else {
        btn.textContent = 'Clock In';
        btn.classList.remove('clock-out');
        btn.classList.add('clock-in');
    }
}

/* ── Pagination ────────────────────────────────────── */
const rowsPerPage = 10;
let currentPage = 1;

function setupPagination() {
    const rows = document.querySelectorAll('#tableBody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    renderPage(currentPage, rows);
    renderPagination(totalPages, rows);
}

function renderPage(page, rows) {
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    rows.forEach((row, i) => {
        row.style.display = (i >= start && i < end) ? '' : 'none';
    });
}

function renderPagination(totalPages, rows) {
    const container = document.getElementById('pagination');
    container.innerHTML = '';

    const prev = document.createElement('button');
    prev.textContent = '‹';
    prev.className = 'page-btn' + (currentPage === 1 ? ' disabled' : '');
    prev.disabled = currentPage === 1;
    prev.onclick = () => changePage(currentPage - 1, totalPages, rows);
    container.appendChild(prev);

    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = 'page-btn' + (i === currentPage ? ' active' : '');
        btn.onclick = () => changePage(i, totalPages, rows);
        container.appendChild(btn);
    }

    const next = document.createElement('button');
    next.textContent = '›';
    next.className = 'page-btn' + (currentPage === totalPages ? ' disabled' : '');
    next.disabled = currentPage === totalPages;
    next.onclick = () => changePage(currentPage + 1, totalPages, rows);
    container.appendChild(next);
}

function changePage(page, totalPages, rows) {
    currentPage = page;
    renderPage(currentPage, rows);
    renderPagination(totalPages, rows);
}

setupPagination();