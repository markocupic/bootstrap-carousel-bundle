class CarouselProgress {
  constructor(root) {
    this.root = root;
    this.carousel = bootstrap.Carousel.getOrCreateInstance(root);

    this.progressBar = root.querySelector(".carousel-progress-bar");
    this.progress = root.querySelector(".carousel-progress");

    // NEW: check if auto‑ride is enabled
    this.autoRide = this.carousel._config.ride === "carousel";

    this.interval = 0;
    this.rafId = null;
    this.startTime = 0;

    this.bindEvents();

    // NEW: only start progress if auto‑ride is active
    if (this.autoRide) {
      this.startProgress();
    } else {
      this.hideProgressBar();
    }
  }

  bindEvents() {
    // Always restart progress when Bootstrap begins a slide transition
    this.root.addEventListener("slide.bs.carousel", () => this.startProgress());

    // Only enable hover‑pause if Bootstrap allows it
    if (this.carousel._config.pause === "hover") {
      this.root.addEventListener("mouseenter", () => this.pauseProgress());
      this.root.addEventListener("mouseleave", () => this.resumeProgress());
    }
  }

  startProgress() {
    cancelAnimationFrame(this.rafId);

    const active = this.root.querySelector(".carousel-item.active");
    const rootInterval = this.root.dataset.bsInterval ? parseInt(this.root.dataset.bsInterval) : 5000;
    this.interval = active.dataset.bsInterval ? parseInt(active.dataset.bsInterval) : rootInterval;
    this.startTime = performance.now();

    // 1) Reset immediately
    this.progressBar.style.transition = "none";
    this.progressBar.style.width = "0%";

    // 2) Forced reflow
    void this.progressBar.offsetWidth;

    // 3) Start animation again
    this.progressBar.style.transition = `width ${this.interval}ms linear`;
    this.progressBar.style.width = "100%";

    this.rafId = requestAnimationFrame((t) => this.animate(t));
  }

  animate(now) {
    const elapsed = now - this.startTime;
    if (elapsed >= this.interval) {
      // finished, nothing more to do
      return;
    }

    this.rafId = requestAnimationFrame((t) => this.animate(t));
  }

  pauseProgress() {
    cancelAnimationFrame(this.rafId);
    this.carousel.pause();

    // Visually freeze the progress bar (keep current width)
    const computed = parseFloat(getComputedStyle(this.progressBar).width);
    const total = this.progressBar.parentElement.clientWidth;
    const percent = (computed / total) * 100;

    this.progressBar.style.transition = "none";
    this.progressBar.style.width = percent + "%";
  }

  resumeProgress() {
    // We intentionally restart from zero — fully synchronized with Bootstrap
    this.carousel.cycle();
    this.startProgress();
  }

  hideProgressBar() {
    if (this.progress) {
      this.progress.style.display = "none";
    }
  }
}
