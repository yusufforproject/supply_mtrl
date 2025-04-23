function updateDateTime() {
    const now = new Date();
    
    // Format tanggal untuk header (Selasa, 12/02/2025 14:58)
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const headerDate = `${days[now.getDay()]}, ${String(now.getDate()).padStart(2, '0')}/${String(now.getMonth() + 1).padStart(2, '0')}/${now.getFullYear()} ${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
    
    // Format waktu (14:58:55 PM)
    const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true }).replace(/\./g, ':');
    
    // Format tanggal (12/02/2025)
    const date = `${String(now.getDate()).padStart(2, '0')}/${String(now.getMonth() + 1).padStart(2, '0')}/${now.getFullYear()}`;
    
    // Update elemen-elemen
    const headerDateTime = document.getElementById('headerDateTime');
    const currentTime = document.getElementById('currentTime');
    const currentDate = document.getElementById('currentDate');
    const currentDate2 = document.getElementById('current-date');
    
    if (headerDateTime) headerDateTime.textContent = headerDate;
    if (currentTime) currentTime.textContent = time;
    if (currentDate) currentDate.textContent = date;
    if (currentDate2) currentDate2.textContent = headerDate;
}

// Update setiap detik
setInterval(updateDateTime, 1000);

// Panggil sekali saat halaman dimuat
document.addEventListener('DOMContentLoaded', updateDateTime); 