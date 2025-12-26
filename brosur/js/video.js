document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('customVideo');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const progressBar = document.getElementById('progressBar');
    const currentTimeDisplay = document.getElementById('currentTime');
    const durationDisplay = document.getElementById('duration');

    // Format waktu (menit:detik)
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    // Update durasi saat video siap
    video.addEventListener('loadedmetadata', function() {
        durationDisplay.textContent = formatTime(video.duration);
    });

    // Update progress bar saat video berjalan
    video.addEventListener('timeupdate', function() {
        const percent = (video.currentTime / video.duration) * 100;
        progressBar.value = percent;
        currentTimeDisplay.textContent = formatTime(video.currentTime);
    });

    // Ganti ikon play/pause
    playPauseBtn.addEventListener('click', function() {
        if (video.paused) {
            video.play();
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                </svg>
            `;
        } else {
            video.pause();
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            `;
        }
    });

    // Ubah posisi video saat slider digeser
    progressBar.addEventListener('input', function() {
        const time = video.duration * (progressBar.value / 100);
        video.currentTime = time;
    });

    // Auto-play saat video masuk viewport
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.parentElement.classList.add('in-view');
                if (video.paused && !video.ended) {
                    video.play();
                    playPauseBtn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                    `;
                }
            } else {
                if (!video.paused) {
                    video.pause();
                    playPauseBtn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    `;
                }
            }
        });
    }, { threshold: 0.3 }); // 30% video harus terlihat

    observer.observe(video);

    // Hover efek pada video
    video.addEventListener('mouseenter', function() {
        this.style.filter = 'brightness(1.1)';
    });

    video.addEventListener('mouseleave', function() {
        this.style.filter = 'brightness(1)';
    });

    // Play ketika diklik
    video.addEventListener('click', function() {
        if (video.paused) {
            video.play();
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                </svg>
            `;
        } else {
            video.pause();
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            `;
        }
    });
});