<?php include '../templates/headerTwo.html.php'; ?>
<a> <img src="https://fontmeme.com/permalink/210515/3930b733345ab492b6aeae8238bfee66.png" alt="netflix-font"></a>
<button id="btn">
    Make it Fire
</button>

<h2 class="text-light titre" >Share links, share love.</h2>
<a class="w3-button w3-black"href="/">Return back</a>
<style>

* {
    box-sizing: border-box;
}

body {
    background-color: #1c1c1c;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    overflow: hidden;
}

button {
    background-color: rebeccapurple;
    border-radius: 5px;
    box-shadow: 4px 4px 5px rgba(255, 255, 255, 0.15);
    border: none;
    color: white;
    cursor: pointer;
    padding: 1rem 2rem;
    position: relative;
    transition: transform 0.1s linear, box-shadow 0.1s linear;
    z-index: 10;
}

button:active {
    transform: translate(4px, 4px);
    box-shadow: 0 0 0 rebeccapurple;
}

button:focus {
    outline: none;
}

.particle {
    --x: 0;
    --y: 0;
    background-color: rebeccapurple;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    height: 5px;
    width: 5px;
    z-index: -1;
}

.particle.move {
    animation: move 1000ms linear forwards;
}

@keyframes move {
    to {
        transform: translate(var(--x), var(--y));
    }

    95% {
        opacity: 1;
    }

    100% {
        opacity: 0;
    }
}

</style>

<script>


const btn = document.getElementById('btn');
const titre = document.getElementById('titre');



btn.addEventListener('click', () => {
const particles = [];
const color = randomColor();

const particle = document.createElement('span');
particle.classList.add('particle', 'move');

const { x, y } = randomLocation();
particle.style.setProperty('--x', x);
particle.style.setProperty('--y', y);
particle.style.background = color;
btn.style.background = color;


btn.appendChild(particle);

particles.push(particle);

setTimeout(() => {

for (let i = 0; i < 100; i++) { const innerP=document.createElement('span'); innerP.classList.add('particle', 'move' ); innerP.style.transform=`translate(${x}, ${y})`; const xs=Math.random() * 200 - 100 + 'px' ; const ys=Math.random() * 200 - 100 + 'px' ; innerP.style.setProperty('--x', `calc(${x} + ${xs})`); innerP.style.setProperty('--y', `calc(${y} + ${ys})`); innerP.style.animationDuration=Math.random() * 300 + 200 + 'ms' ; innerP.style.background=color; btn.appendChild(innerP); particles.push(innerP); } setTimeout(()=> {
    particles.forEach(particle => {
    particle.remove();
    });
    }, 1000);
    }, 1000);
    });

    function randomLocation() {
    return {
    x: Math.random() * window.innerWidth - window.innerWidth / 2 + 'px',
    y: Math.random() * window.innerHeight - window.innerHeight / 2 + 'px' };

    }

    function randomColor() {
    return `hsl(${Math.floor(Math.random() * 361)}, 100%, 50%)`;
    }

</script>










<?php //include '../templates/footer.html.php';?>