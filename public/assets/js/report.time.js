/* ── report.time.js ─────────────────────── */

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

(function readInternParams() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');
    const name = params.get('name');

    if (id || name) {
        const bar = document.getElementById('internHeaderBar');
        const nameEl = document.getElementById('internContextName');
        const idEl = document.getElementById('internContextId');

        if (name) nameEl.textContent = name + "'s Timesheet";
        if (id) idEl.textContent = 'ID: ' + id;
        if (name) document.title = name + ' – Timesheet | Omega Healthcare';

        bar.style.display = 'flex';
    }
})();

/* ── ADD TIME MODAL ──────────────────────────────────── */

function openAddTimeModal() {
    // Pre-fill today's date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('entryDate').value = today;
    document.getElementById('timeIn').value = '';
    document.getElementById('timeOut').value = '';
    document.getElementById('totalHours').value = '';

    document.getElementById('addTimeModal').classList.add('open');
}

function closeAddTimeModal() {
    document.getElementById('addTimeModal').classList.remove('open');
}

// Close modal when clicking the dark overlay
document.getElementById('addTimeModal').addEventListener('click', function (e) {
    if (e.target === this) closeAddTimeModal();
});

// Auto-calculate total hours whenever Time In or Time Out changes
['timeIn', 'timeOut'].forEach(id => {
    document.getElementById(id).addEventListener('change', calculateHours);
});

function calculateHours() {
    const timeIn = document.getElementById('timeIn').value;
    const timeOut = document.getElementById('timeOut').value;
    const output = document.getElementById('totalHours');

    if (!timeIn || !timeOut) { output.value = ''; return; }

    const [inH, inM, inS] = timeIn.split(':').map(Number);
    const [outH, outM, outS] = timeOut.split(':').map(Number);

    let totalSeconds = (outH * 3600 + outM * 60 + (outS || 0))
        - (inH * 3600 + inM * 60 + (inS || 0));

    if (totalSeconds <= 0) {
        output.value = 'Invalid range';
        return;
    }

    const hours = (totalSeconds / 3600).toFixed(2);
    output.value = hours + ' hrs';
}

function saveTimeEntry() {
    const date = document.getElementById('entryDate').value;
    const timeIn = document.getElementById('timeIn').value;
    const timeOut = document.getElementById('timeOut').value;
    const total = document.getElementById('totalHours').value;

    // Basic validation
    if (!date || !timeIn || !timeOut) {
        alert('Please fill in all fields.');
        return;
    }
    if (total === 'Invalid range' || total === '') {
        alert('Time Out must be later than Time In.');
        return;
    }

    // Format date display: "Mar 04, 2026 (Wed)"
    const dateObj = new Date(date + 'T00:00:00');
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const dayLabel = days[dateObj.getDay()];
    const dateStr = `${months[dateObj.getMonth()]} ${String(dateObj.getDate()).padStart(2, '0')}, ${dateObj.getFullYear()} (${dayLabel})`;

    // Format time display: "09:51:49 AM"
    function formatTime(t) {
        const [h, m, s] = t.split(':').map(Number);
        const ampm = h >= 12 ? 'PM' : 'AM';
        const h12 = String(h % 12 || 12).padStart(2, '0');
        const mm = String(m).padStart(2, '0');
        const ss = String(s || 0).padStart(2, '0');
        return `${h12}:${mm}:${ss} ${ampm}`;
    }

    const timeInDisplay = formatTime(timeIn);
    const timeOutDisplay = formatTime(timeOut);
    const totalDisplay = parseFloat(total).toFixed(2);

    // Inject new row into the table
    const tbody = document.querySelector('.intern-table tbody');
    const tr = document.createElement('tr');
    tr.dataset.date = date;
    tr.dataset.timein = timeIn;
    tr.dataset.timeout = timeOut;
    tr.innerHTML = `
    <td>${dateStr}</td>
    <td>${timeInDisplay}</td>
    <td>${timeOutDisplay}</td>
    <td>${totalDisplay}</td>
    <td><button class="btn btn-edit" onclick="openEditModal(this)">Edit</button></td>
`;
    tbody.appendChild(tr);

    closeAddTimeModal();
}

/* ── EDIT TIME MODAL ─────────────────────────────────── */

// Track which row is being edited
let currentEditRow = null;

function openEditModal(btn) {
    const row = btn.closest('tr');
    currentEditRow = row;

    // Populate fields from the row's data attributes
    document.getElementById('editDate').value    = row.dataset.date;
    document.getElementById('editTimeIn').value  = row.dataset.timein;
    document.getElementById('editTimeOut').value = row.dataset.timeout;

    // Show calculated total
    calculateEditHours();

    document.getElementById('editTimeModal').classList.add('open');
}

function closeEditModal() {
    document.getElementById('editTimeModal').classList.remove('open');
    currentEditRow = null;
}

// Close when clicking the overlay backdrop
document.getElementById('editTimeModal').addEventListener('click', function (e) {
    if (e.target === this) closeEditModal();
});

// Auto-recalculate when times change
['editTimeIn', 'editTimeOut'].forEach(id => {
    document.getElementById(id).addEventListener('change', calculateEditHours);
});

function calculateEditHours() {
    const timeIn  = document.getElementById('editTimeIn').value;
    const timeOut = document.getElementById('editTimeOut').value;
    const output  = document.getElementById('editTotalHours');

    if (!timeIn || !timeOut) { output.value = ''; return; }

    const [inH, inM, inS]   = timeIn.split(':').map(Number);
    const [outH, outM, outS] = timeOut.split(':').map(Number);

    let totalSeconds = (outH * 3600 + outM * 60 + (outS || 0))
                     - (inH  * 3600 + inM  * 60 + (inS  || 0));

    if (totalSeconds <= 0) {
        output.value = 'Invalid range';
        return;
    }

    output.value = (totalSeconds / 3600).toFixed(2) + ' hrs';
}

function updateTimeEntry() {
    const date    = document.getElementById('editDate').value;
    const timeIn  = document.getElementById('editTimeIn').value;
    const timeOut = document.getElementById('editTimeOut').value;
    const total   = document.getElementById('editTotalHours').value;

    if (!date || !timeIn || !timeOut) {
        alert('Please fill in all fields.');
        return;
    }
    if (total === 'Invalid range' || total === '') {
        alert('Time Out must be later than Time In.');
        return;
    }

    // Format date: "Mar 04, 2026 (Wed)"
    const dateObj  = new Date(date + 'T00:00:00');
    const days     = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    const months   = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    const dateStr  = `${months[dateObj.getMonth()]} ${String(dateObj.getDate()).padStart(2,'0')}, ${dateObj.getFullYear()} (${days[dateObj.getDay()]})`;

    // Format time: "09:51:49 AM"
    function formatTime(t) {
        const [h, m, s] = t.split(':').map(Number);
        const ampm = h >= 12 ? 'PM' : 'AM';
        const h12  = String(h % 12 || 12).padStart(2, '0');
        return `${h12}:${String(m).padStart(2,'0')}:${String(s||0).padStart(2,'0')} ${ampm}`;
    }

    const cells = currentEditRow.querySelectorAll('td');
    cells[0].textContent = dateStr;
    cells[1].textContent = formatTime(timeIn);
    cells[2].textContent = formatTime(timeOut);
    cells[3].textContent = parseFloat(total).toFixed(2);

    // Update data attributes for future edits
    currentEditRow.dataset.date    = date;
    currentEditRow.dataset.timein  = timeIn;
    currentEditRow.dataset.timeout = timeOut;

    closeEditModal();
}

function deleteTimeEntry() {
    if (!confirm('Are you sure you want to delete this entry?')) return;
    currentEditRow.remove();
    closeEditModal();
}