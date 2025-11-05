// Simple snow animation ❄️
document.addEventListener('DOMContentLoaded', function() {
  for (let i = 0; i < 20; i++) {
    let flake = document.createElement('div');
    flake.classList.add('snowflake');
    flake.innerHTML = '❄️';
    flake.style.left = Math.random() * 100 + 'vw';
    flake.style.animationDuration = (Math.random() * 3 + 3) + 's';
    flake.style.fontSize = (Math.random() * 16 + 14) + 'px';
    document.body.appendChild(flake);
  }
});
