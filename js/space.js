document.onreadystatechange = () => {
    var w = window.innerWidth;
    var h = window.innerHeight;

    var erised = new Audio('audio/erised.mp3')
    erised.volume = 0.1

    window.onresize = function () {
        w = ctx.canvas.width = window.innerWidth;
        h = ctx.canvas.height = window.innerHeight;
    };

    var canvas = document.getElementById('canvas');
    // document.body.appendChild(canvas);

    // var canvas2 = document.createElement('canvas');
    // document.body.appendChild(canvas2);
    // startStars(canvas2)

    canvas.width = w;
    canvas.height = h;

    var ctx = canvas.getContext('2d');

    var mix_Red;
    var mix_Green;
    var mix_Blue;
    opacity = .15;
    smoke_Size = 5;
    select = { Compositing: 'lighter' };

    class Particle {
        constructor() {
            this.osc1 = {
                osc: 0,
                val: 0,
                freq: Math.random()
            };

            this.osc2 = {
                osc: 0,
                val: 0,
                freq: Math.random()
            };

            this.counter = 0;
            this.x = mousePos.x;
            this.y = mousePos.y;
            this.size = Math.random() * 100;
            this.growth = Math.random() / 20;
            this.life = Math.random();
            this.opacity = Math.random() / 5;
            this.speed = {
                x: Math.random(),
                y: Math.random()
            };

            this.texture = createSmokeParticle();
            this.rotationOsc = Math.round(Math.random()) ? 'osc1' : 'osc2';
        }
    }

    /*var controls = new function () {
        this.mix_Red = mix_Red;
        this.mix_Green = mix_Green;
        this.mix_Blue = mix_Blue;
        this.opacity = opacity;
        this.smoke_Size = smoke_Size;

        this.redraw = function () {
            mix_Red = controls.mix_Red;
            mix_Green = controls.mix_Green;
            mix_Blue = controls.mix_Blue;
            opacity = controls.opacity;
            smoke_Size = controls.smoke_Size;
            ctx.globalCompositeOperation = Object.values(select)[0];
        }
    }*/

    var obj = {
        CLEAR_CANVAS: function () {
            ctx.clearRect(0, 0, w, h);
        }
    };

    // var gui = new dat.GUI({resizable: false});


    ctx.fillStyle = 'transparent';
    ctx.fillRect(0, 0, w, h);

    ctx.globalCompositeOperation = 'lighter';

    var setPartColors = () => {
        let getRandomColorValue = () => Math.floor(Math.random() * 255) + 0;

        mix_Red = getRandomColorValue();
        mix_Blue = getRandomColorValue();
        mix_Green = getRandomColorValue();
    };

    const randomNumbers = (length) => Array.from({ length }, () => Math.random());

    const TAU = Math.PI * 2;

    const createSmokeParticle = () => {
        const canvas = document.createElement('canvas');

        const width = 100;
        const height = 100;
        const centerX = width * 0.5;
        const centerY = height * 0.5;

        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d');
        canvas.ctx = ctx;

        const xRand = -5 + Math.random() * 10;
        const yRand = -5 + Math.random() * 10;
        const xRand2 = 10 + Math.random() * (centerX / 2);
        const yRand2 = 10 + Math.random() * (centerY / 2);

        const randomColorValue = (baseValue) => Math.round(baseValue + Math.random() * 100);
        const color = {
            r: randomColorValue(mix_Red),
            g: randomColorValue(mix_Green),
            b: randomColorValue(mix_Blue)
        };

        ctx.fillStyle = `rgba(${color.r}, ${color.g}, ${color.b}, ${opacity})`;

        Array.from({ length: 200 }, () => randomNumbers(3)).forEach((p, i, arr) => {
            const length = arr.length;

            const x = Math.cos(TAU / (xRand * length) * i) * p[2] * xRand2 + centerX;
            const y = Math.sin(TAU / (yRand * length) * i) * p[2] * yRand2 + centerY;

            ctx.beginPath();
            ctx.moveTo(x, y);
            ctx.arc(x, y, p[2] * 4, 0, TAU);
            ctx.fill();
        });

        return canvas;
    };


    var particles = [];

    var update = function update() {
        particles.forEach((p) => {
            p.x = mousePos.x;
            p.y = mousePos.y;
            p.size = Math.sqrt(Math.pow(p.x - p.ox, 2) + Math.pow(p.y - p.oy, 2)) * smoke_Size;
            p.counter += 0.01;
            p.growth = Math.sin(p.life);
            p.life -= 0.001;
            p.osc1.osc = Math.sin(p.osc1.val += p.osc1.freq);
            p.osc2.osc = Math.cos(p.osc2.val += p.osc2.freq);
            p.ox = p.x;
            p.oy = p.y;
        });

    };

    var render = function render() {
        particles.forEach((p) => {
            ctx.save();

            ctx.globalAlpha = p.opacity / (p.size / 50);
            ctx.translate(p.x, p.y);
            ctx.rotate(Math.random() * TAU);
            ctx.drawImage(p.texture, 0 - p.size / 2, 0 - p.size / 2, p.size, p.size);

            ctx.globalAlpha = 1;
            ctx.beginPath();
            const red = 155 + Math.round(Math.random() * 100);
            const green = 155 + Math.round(Math.random() * 100);
            const blue = 155 + Math.round(Math.random() * 100);
            const alpha = Math.random();
            ctx.fillStyle = `rgba(${red}, ${green}, ${blue}, ${alpha})`;

            ctx.arc(Math.random() * p.size, Math.random() * p.size, Math.random(), 0, TAU);
            ctx.fill();

            ctx.restore();
        });


    };

    const loop = () => {
        update();
        render();
        window.requestAnimationFrame(loop);
    };


    const mousePos = {
        x: 0,
        y: 0
    };


    let drawingMode = false;

    const activateDraw = (e) => {
        drawingMode = true;
        particles = Array.from(new Array(30), () => new Particle());
        draw(e);
    };

    const disableDraw = (e) => {
        drawingMode = false;
        particles = [];
    };

    const draw = (e) => {
        if (!drawingMode) return;

        particles.forEach((p) => {
            p.size = Math.max(10, e.movementX + e.movementY);
        });
    };


    canvas.addEventListener('mouseenter', activateDraw);
    canvas.addEventListener('mousemove', handleMouseMove);
    canvas.addEventListener('click', handleClick);
    canvas.addEventListener('touchstart', activateDraw);
    canvas.addEventListener('touchmove', handleTouchMove);

    function handleMouseMove(e) {
        mousePos.x = e.layerX;
        mousePos.y = e.layerY;
        draw(e);
        erised.play();
    }

    function handleClick(e) {
        setPartColors();
        erised.play();
    }

    function handleTouchMove(e) {
        erised.play();
        mousePos.x = e.touches[0].clientX;
        mousePos.y = e.touches[0].clientY;
        draw(e);
    }


    //canvas.addEventListener('touchstart', e => activateDraw);
    //canvas.addEventListener('touchmove', e => draw);
    //canvas.addEventListener('touchend', e => disableDraw);

    setPartColors()
    loop();


    function startStars(canvas) {

        //Helpers
        function lineToAngle(x1, y1, length, radians) {
            var x2 = x1 + length * Math.cos(radians),
                y2 = y1 + length * Math.sin(radians);
            return { x: x2, y: y2 };
        }

        function randomRange(min, max) {
            return min + Math.random() * (max - min);
        }

        function degreesToRads(degrees) {
            return degrees / 180 * Math.PI;
        }

        //Particle
        var particle = {
            x: 0,
            y: 0,
            vx: 0,
            vy: 0,
            radius: 0,

            create: function (x, y, speed, direction) {
                var obj = Object.create(this);
                obj.x = x;
                obj.y = y;
                obj.vx = Math.cos(direction) * speed;
                obj.vy = Math.sin(direction) * speed;
                return obj;
            },

            getSpeed: function () {
                return Math.sqrt(this.vx * this.vx + this.vy * this.vy);
            },

            setSpeed: function (speed) {
                var heading = this.getHeading();
                this.vx = Math.cos(heading) * speed;
                this.vy = Math.sin(heading) * speed;
            },

            getHeading: function () {
                return Math.atan2(this.vy, this.vx);
            },

            setHeading: function (heading) {
                var speed = this.getSpeed();
                this.vx = Math.cos(heading) * speed;
                this.vy = Math.sin(heading) * speed;
            },

            update: function () {
                this.x += this.vx;
                this.y += this.vy;
            }
        };

        //Canvas and settings
        // var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
            width = canvas.width = window.innerWidth,
            height = canvas.height = window.innerHeight,
            stars = [],
            shootingStars = [],
            layers = [
                // {speed: 1, scale: 0.8, count: 320},
                { speed: 0.03, scale: 0.2, count: 320 },
                { speed: 0.08, scale: 0.5, count: 50 },
                { speed: 0.1, scale: 0.75, count: 30 }
            ],
            starsAngle = 145,
            shootingStarSpeed = {
                min: 25,
                max: 80
            },
            shootingStarOpacityDelta = 0.01,
            trailLengthDelta = 0.01,
            shootingStarEmittingInterval = 2000,
            shootingStarLifeTime = 500,
            maxTrailLength = 300,
            starBaseRadius = 2,
            shootingStarRadius = 3,
            paused = false;

        //Create all stars
        for (var j = 0; j < layers.length; j += 1) {
            var layer = layers[j];
            for (var i = 0; i < layer.count; i += 1) {
                var star = particle.create(randomRange(0, width), randomRange(0, height), 0, 0);
                star.radius = starBaseRadius * layer.scale;
                star.setSpeed(layer.speed);
                star.setHeading(degreesToRads(starsAngle));
                stars.push(star);
            }
        }

        function createShootingStar() {
            var shootingStar = particle.create(randomRange(width / 2, width), randomRange(0, height / 2), 0, 0);
            shootingStar.setSpeed(randomRange(shootingStarSpeed.min, shootingStarSpeed.max));
            shootingStar.setHeading(degreesToRads(starsAngle));
            shootingStar.radius = shootingStarRadius;
            shootingStar.opacity = 0;
            shootingStar.trailLengthDelta = 0;
            shootingStar.isSpawning = true;
            shootingStar.isDying = false;
            shootingStars.push(shootingStar);
        }

        function killShootingStar(shootingStar) {
            setTimeout(function () {
                shootingStar.isDying = true;
            }, shootingStarLifeTime);
        }

        function update() {
            if (!paused) {
                context.clearRect(0, 0, width, height);
                context.fillStyle = "transparent";
                context.fillRect(0, 0, width, height);
                context.fill();

                for (var i = 0; i < stars.length; i += 1) {
                    var star = stars[i];
                    star.update();
                    drawStar(star);
                    if (star.x > width) {
                        star.x = 0;
                    }
                    if (star.x < 0) {
                        star.x = width;
                    }
                    if (star.y > height) {
                        star.y = 0;
                    }
                    if (star.y < 0) {
                        star.y = height;
                    }
                }

                for (i = 0; i < shootingStars.length; i += 1) {
                    var shootingStar = shootingStars[i];
                    if (shootingStar.isSpawning) {
                        shootingStar.opacity += shootingStarOpacityDelta;
                        if (shootingStar.opacity >= 1.0) {
                            shootingStar.isSpawning = false;
                            killShootingStar(shootingStar);
                        }
                    }
                    if (shootingStar.isDying) {
                        shootingStar.opacity -= shootingStarOpacityDelta;
                        if (shootingStar.opacity <= 0.0) {
                            shootingStar.isDying = false;
                            shootingStar.isDead = true;
                        }
                    }
                    shootingStar.trailLengthDelta += trailLengthDelta;

                    shootingStar.update();
                    if (shootingStar.opacity > 0.0) {
                        drawShootingStar(shootingStar);
                    }
                }

                //Delete dead shooting shootingStars
                for (i = shootingStars.length - 1; i >= 0; i--) {
                    if (shootingStars[i].isDead) {
                        shootingStars.splice(i, 1);
                    }
                }
            }
            requestAnimationFrame(update);
        }

        function drawStar(star) {
            context.fillStyle = "white";
            context.beginPath();
            context.arc(star.x, star.y, star.radius, 0, Math.PI * 2, false);
            context.fill();
        }

        function drawShootingStar(p) {
            var x = p.x,
                y = p.y,
                currentTrailLength = (maxTrailLength * p.trailLengthDelta),
                pos = lineToAngle(x, y, -currentTrailLength, p.getHeading());

            context.fillStyle = "rgba(255, 255, 255, " + p.opacity + ")";
            // context.beginPath();
            // context.arc(x, y, p.radius, 0, Math.PI * 2, false);
            // context.fill();
            var starLength = 5;
            context.beginPath();
            context.moveTo(x - 1, y + 1);

            context.lineTo(x, y + starLength);
            context.lineTo(x + 1, y + 1);

            context.lineTo(x + starLength, y);
            context.lineTo(x + 1, y - 1);

            context.lineTo(x, y + 1);
            context.lineTo(x, y - starLength);

            context.lineTo(x - 1, y - 1);
            context.lineTo(x - starLength, y);

            context.lineTo(x - 1, y + 1);
            context.lineTo(x - starLength, y);

            context.closePath();
            context.fill();

            //trail
            context.fillStyle = "rgba(255, 221, 157, " + p.opacity + ")";
            context.beginPath();
            context.moveTo(x - 1, y - 1);
            context.lineTo(pos.x, pos.y);
            context.lineTo(x + 1, y + 1);
            context.closePath();
            context.fill();
        }

        //Run
        update();

        //Shooting stars
        setInterval(function () {
            if (paused) return;
            createShootingStar();
        }, shootingStarEmittingInterval);

        window.onfocus = function () {
            paused = false;
        };

        window.onblur = function () {
            paused = true;
        };

    }

}
