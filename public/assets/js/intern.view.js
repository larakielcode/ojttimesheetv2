// intern.view.js

let activeTab = 'all';
let currentProfileRow = null; // tracks which <tr> is open in the profile modal
let isEditMode = false;

/* ── TABS ── */
function switchTab(el, tab) {
  document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  activeTab = tab;
  filterCards();
}

/* ── SEARCH + FILTER ── */
function filterCards() {
  const query = document.getElementById('searchInput').value.toLowerCase().trim();
  const rows = document.querySelectorAll('.intern-row');
  let visibleCount = 0;

  rows.forEach(row => {
    const id     = (row.dataset.id || '').toLowerCase();
    const first  = (row.dataset.firstname || '').toLowerCase();
    const last   = (row.dataset.lastname || '').toLowerCase();
    const full   = first + ' ' + last;
    const status = (row.dataset.status || '').toLowerCase();

    const matchesSearch = !query || id.includes(query) || full.includes(query);
    const matchesTab =
      activeTab === 'all' ||
      (activeTab === 'active'   && status === 'active') ||
      (activeTab === 'inactive' && status === 'inactive');

    const visible = matchesSearch && matchesTab;
    row.style.display = visible ? '' : 'none';
    if (visible) visibleCount++;
  });

  document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
}

/* ── ADD INTERN MODAL ── */
function openModal() {
  document.getElementById('modalOverlay').classList.add('open');
}
function closeModal() {
  document.getElementById('modalOverlay').classList.remove('open');
}
function closeModalOutside(e) {
  if (e.target === document.getElementById('modalOverlay')) closeModal();
}

/* ── VIEW PROFILE MODAL ── */
function openProfile(row) {
  currentProfileRow = row;
  isEditMode = false;

  const d = row.dataset;

  // Populate fields
  document.getElementById('profileFullName').textContent =
    `${d.firstname} ${d.lastname}`;
  document.getElementById('profileIdBadge').textContent = `ID: ${d.id}`;
  document.getElementById('profileFirstName').value  = d.firstname  || '';
  document.getElementById('profileMiddleName').value = d.middlename || '';
  document.getElementById('profileLastName').value   = d.lastname   || '';
  document.getElementById('profileSchool').value     = d.school     || '';
  document.getElementById('profileRequired').value   = d.required   || '';
  document.getElementById('profileHours').value      = d.hours      || '';
  document.getElementById('profileEmail').value      = d.email      || '';
  document.getElementById('profileMobile').value     = d.mobile     || '';
  document.getElementById('profileAddress').value    = d.address    || '';

  // Progress bar
  const pct = d.required > 0 ? Math.round((d.hours / d.required) * 100) : 0;
  document.getElementById('profileProgressBar').style.width = pct + '%';
  document.getElementById('profileProgressText').textContent = `${d.hours}/${d.required} hrs`;

  // Status select
  const statusSel = document.getElementById('profileStatus');
  statusSel.value = d.status || 'active';

  // Site select
  const siteSel = document.getElementById('profileSite');
  siteSel.value = d.site || 'Cebu';

  // Set delete confirm name
  document.getElementById('deleteInternName').textContent =
    `${d.firstname} ${d.lastname}`;

  // Reset to read-only mode
  setProfileReadOnly(true);

  document.getElementById('profileOverlay').classList.add('open');
}

function closeProfile() {
  document.getElementById('profileOverlay').classList.remove('open');
  currentProfileRow = null;
  isEditMode = false;
}

function closeProfileOutside(e) {
  if (e.target === document.getElementById('profileOverlay')) closeProfile();
}

/* ── TOGGLE EDIT MODE ── */
function toggleEditMode() {
  isEditMode = !isEditMode;
  setProfileReadOnly(!isEditMode);
}

function setProfileReadOnly(readOnly) {
  const fields = document.querySelectorAll('.profile-field');
  const editBtn = document.getElementById('profileEditBtn');
  const saveBtn = document.getElementById('profileSaveBtn');
  const cancelBtn = document.getElementById('profileCancelBtn'); // keep in HTML, hidden by default

  fields.forEach(f => {
    if (f.tagName === 'SELECT') f.disabled = readOnly;
    else f.readOnly = readOnly;
    f.classList.toggle('editable', !readOnly);
  });

  editBtn.style.display   = readOnly ? '' : 'none';
  saveBtn.style.display   = readOnly ? 'none' : '';
  cancelBtn.style.display = readOnly ? 'none' : ''; // only visible in edit mode
  if (!readOnly) {
    cancelBtn.textContent = 'Cancel';
    cancelBtn.onclick = cancelEdit;
  }
}

function cancelEdit() {
  // Re-open the same row data (revert changes)
  if (currentProfileRow) openProfile(currentProfileRow);
}

/* ── SAVE EDITED PROFILE ── */
function saveProfile() {
  if (!currentProfileRow) return;

  const d = currentProfileRow.dataset;

  // Read updated values
  const newFirst    = document.getElementById('profileFirstName').value.trim();
  const newMiddle   = document.getElementById('profileMiddleName').value.trim();
  const newLast     = document.getElementById('profileLastName').value.trim();
  const newSchool   = document.getElementById('profileSchool').value.trim();
  const newRequired = document.getElementById('profileRequired').value.trim();
  const newHours    = document.getElementById('profileHours').value.trim();
  const newEmail    = document.getElementById('profileEmail').value.trim();
  const newMobile   = document.getElementById('profileMobile').value.trim();
  const newAddress  = document.getElementById('profileAddress').value.trim();
  const newStatus   = document.getElementById('profileStatus').value;
  const newSite     = document.getElementById('profileSite').value;

  // Update data attributes on the row
  d.firstname  = newFirst;
  d.middlename = newMiddle;
  d.lastname   = newLast;
  d.school     = newSchool;
  d.required   = newRequired;
  d.hours      = newHours;
  d.email      = newEmail;
  d.mobile     = newMobile;
  d.address    = newAddress;
  d.status     = newStatus;
  d.site       = newSite;

  // Update the visible table cells
  const cells = currentProfileRow.querySelectorAll('td');
  cells[1].textContent = `${newFirst} ${newLast}`;
  cells[2].textContent = newSchool;

  // Update site badge
  const siteBadge = cells[3].querySelector('.site-badge');
  if (siteBadge) {
    siteBadge.textContent = newSite;
    siteBadge.className = 'site-badge ' +
      (newSite === 'Manila' ? 'badge-manila' : 'badge-cebu');
  }

  // Update hours progress
  const pct = newRequired > 0 ? Math.round((newHours / newRequired) * 100) : 0;
  const barFill = cells[4].querySelector('.hours-bar-fill');
  const hrsText = cells[4].querySelector('.hours-text');
  if (barFill) barFill.style.width = pct + '%';
  if (hrsText) hrsText.textContent = `${newHours}/${newRequired} hrs`;

  // Update status badge
  const statusBadge = cells[5].querySelector('.status-badge');
  if (statusBadge) {
    statusBadge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
    statusBadge.className = 'status-badge ' +
      (newStatus === 'active' ? 'badge-active' : 'badge-inactive');
  }

  // Back to read-only
  isEditMode = false;
  setProfileReadOnly(true);

  // Refresh the name in the header
  document.getElementById('profileFullName').textContent = `${newFirst} ${newLast}`;
}

/* ── DELETE ── */
function confirmDelete() {
  // Show delete confirm modal on top
  document.getElementById('deleteOverlay').classList.add('open');
}

function closeDeleteConfirm() {
  document.getElementById('deleteOverlay').classList.remove('open');
}

function closeDeleteOutside(e) {
  if (e.target === document.getElementById('deleteOverlay')) closeDeleteConfirm();
}

function deleteIntern() {
  if (currentProfileRow) {
    currentProfileRow.remove();
  }
  closeDeleteConfirm();
  closeProfile();

  // Check if table is now empty
  const remaining = document.querySelectorAll('.intern-row');
  let visibleCount = 0;
  remaining.forEach(r => {
    if (r.style.display !== 'none') visibleCount++;
  });
  document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
}