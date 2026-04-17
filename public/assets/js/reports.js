/* ── SEARCH + FILTER ── */
function filterCards() {
  const query = document.getElementById('searchInput').value.toLowerCase().trim();
  const rows = document.querySelectorAll('.intern-row');
  let visibleCount = 0;

  rows.forEach(row => {
    const id   = (row.dataset.id || '').toLowerCase();
    const first = (row.dataset.firstname || '').toLowerCase();
    const last  = (row.dataset.lastname || '').toLowerCase();
    const full  = first + ' ' + last;

    const visible = !query || id.includes(query) || full.includes(query);
    row.style.display = visible ? '' : 'none';
    if (visible) visibleCount++;
  });

  document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
}