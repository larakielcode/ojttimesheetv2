/* ── reports.js ─────────────────────── */

/* ── SEARCH + FILTER ── */
function filterCards() {
  const query = document.getElementById('searchInput').value.toLowerCase().trim();
  const rows = document.querySelectorAll('.intern-row');
  let visibleCount = 0;

  rows.forEach(row => {
    const id   = (row.dataset.id   || '').toLowerCase();
    const name = (row.dataset.name || '').toLowerCase();

    const visible = !query || id.includes(query) || name.includes(query);
    row.style.display = visible ? '' : 'none';
    if (visible) visibleCount++;
  });

  document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
}

function goToTimesheet(row) {
  const id = row.dataset.id;
  const name = row.dataset.name;
  window.location.href = `/views/reports.time.view.html?id=${encodeURIComponent(id)}&name=${encodeURIComponent(name)}`;
}

/* ── Navigate to intern's timesheet ── */
function goToTimesheet(row) {
    const id   = row.dataset.id;
    const name = row.dataset.name;
    window.location.href = `/views/reports.time.view.html?id=${encodeURIComponent(id)}&name=${encodeURIComponent(name)}`;
}