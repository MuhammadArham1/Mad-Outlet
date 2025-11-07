(function () {
  // Create and append canvas
  const canvas = document.createElement('canvas');
  canvas.id = 'snow-canvas';
  document.body.appendChild(canvas);
  const ctx = canvas.getContext('2d');

  const colors = ['#ffffff', '#f0f8ff', '#eaf6ff'];
  const flakes = [];
  let w, h, dpr = Math.max(1, window.devicePixelRatio || 1);

  function resize() {
    w = window.innerWidth;
    h = window.innerHeight;
    canvas.width = w * dpr;
    canvas.height = h * dpr;
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function random(min, max) {
    return Math.random() * (max - min) + min;
  }

  function createFlake() {
    return {
      x: random(0, w),
      y: random(-h, 0),
      r: random(0.8, 3.5),
      d: random(0.5, 1.5),
      vx: random(-0.3, 0.3),
      vy: random(0.5, 1.5),
      color: colors[Math.floor(Math.random() * colors.length)],
      opacity: random(0.4, 1)
    };
  }

  function init() {
    resize();
    flakes.length = 0;
    const count = Math.min(Math.round(Math.max(w, 600) / 6), 400);
    for (let i = 0; i < count; i++) flakes.push(createFlake());
  }

  function update() {
    ctx.clearRect(0, 0, w, h);
    for (let f of flakes) {
      f.x += f.vx;
      f.y += f.vy * f.d;
      if (f.y > h || f.x < -20 || f.x > w + 20) {
        Object.assign(f, createFlake(), { y: -10 });
      }

      // create soft glow effect using radial gradient
      const gradient = ctx.createRadialGradient(f.x, f.y, 0, f.x, f.y, f.r * 2.5);
      gradient.addColorStop(0, `rgba(255,255,255,${f.opacity})`);
      gradient.addColorStop(0.5, `rgba(255,255,255,${f.opacity * 0.5})`);
      gradient.addColorStop(1, 'rgba(255,255,255,0)');

      ctx.beginPath();
      ctx.fillStyle = gradient;
      ctx.arc(f.x, f.y, f.r * 2, 0, Math.PI * 2);
      ctx.fill();
    }
    requestAnimationFrame(update);
  }

  window.addEventListener('resize', resize);
  init();
  update();
})();