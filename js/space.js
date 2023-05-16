var w = window.innerWidth;
var h = window.innerHeight;

window.onresize = function () {
    w = ctx.canvas.width = window.innerWidth;
    h = ctx.canvas.height = window.innerHeight;
};

var canvas = document.getElementById('canvas');
// var canvas2 = document.createElement('canvas');
// document.body.appendChild(canvas);
// document.body.appendChild(canvas2);

// startStars(canvas2)

canvas.width = w;
canvas.height = h;

var ctx = canvas.getContext('2d');

mix_Red = Math.floor(Math.random() * 255) + 120;
mix_Green = Math.floor(Math.random() * 255) + 120;
mix_Blue = Math.floor(Math.random() * 255) + 120;
opacity = .15;
smoke_Size = 5;
select = {Compositing: 'lighter'};

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

var randomNumbers = function randomNumbers(length) {
    return Array.from(new Array(length), function () {
        return Math.random();
    });
};
var TAU = Math.PI * 2;

var createSmokeParticle = function createSmokeParticle() {

    var canvas = document.createElement('canvas');

    var w = 100;
    var h = 100;
    var cx = w * 0.5;
    var cy = h * 0.5;

    canvas.width = w;
    canvas.height = h;
    var ctx = canvas.getContext('2d');
    canvas.ctx = ctx;

    var xRand = -5 + Math.random() * 10;
    var yRand = -5 + Math.random() * 10;
    var xRand2 = 10 + Math.random() * (cx / 2);
    var yRand2 = 10 + Math.random() * (cy / 2);

    var color = {
        // r: mix_Red,
        // g: mix_Green,
        // b: mix_Blue
        r: Math.round(mix_Red + Math.random() * 100),
        g: Math.round(mix_Green + Math.random() * 100),
        b: Math.round(mix_Blue + Math.random() * 100)
    };


    ctx.fillStyle = 'rgba(' + color.r + ',' + color.g + ',' + color.b + ',' + opacity + ')';

    Array.from(new Array(200), function () {
        return randomNumbers(3);
    }).forEach(function (p, i, arr) {
        var length = arr.length;

        var x = Math.cos(TAU / xRand / length * i) * p[2] * xRand2 + cx;
        var y = Math.sin(TAU / yRand / length * i) * p[2] * yRand2 + cy;


        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.arc(x, y, p[2] * 4, 0, TAU);
        ctx.fill();
    });

    return canvas;
};

var Particle = function Particle() {
    var p = this;
    p.osc1 = {
        osc: 0,
        val: 0,
        freq: Math.random()
    };

    p.osc2 = {
        osc: 0,
        val: 0,
        freq: Math.random()
    };

    p.counter = 0;
    p.x = mousePos.x;
    p.y = mousePos.y;
    p.size = Math.random() * 100;
    p.growth = Math.random() / 20;
    p.life = Math.random();
    p.opacity = Math.random() / 5;
    p.speed = {
        x: Math.random(),
        y: Math.random()
    };

    p.texture = createSmokeParticle();
    p.rotationOsc = Math.round(Math.random()) ? 'osc1' : 'osc2';
};

var particles = [];

var update = function update() {
    // console.log(mouse)
    particles.forEach(function (p, i) {

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
    particles.forEach(function (p) {
        ctx.save();

        ctx.globalAlpha = p.opacity / (p.size / 50);
        ctx.translate(p.x, p.y);
        ctx.rotate(Math.random() * TAU);
        ctx.drawImage(p.texture, 0 - p.size / 2, 0 - p.size / 2, p.size, p.size);

        ctx.globalAlpha = 1;
        ctx.beginPath();
        ctx.fillStyle = 'rgba(' + (
                155 + Math.round(Math.random() * 100)) + ',' + (
                155 + Math.round(Math.random() * 100)) + ',' + (
                155 + Math.round(Math.random() * 100)) + ',' +
            Math.random() + ')';

        ctx.arc(Math.random() * p.size, Math.random() * p.size, Math.random(), 0, TAU);
        ctx.fill();

        ctx.restore();

    });

};

var loop = function loop() {
    update();
    render();
    window.requestAnimationFrame(loop);
};

var mousePos = {
    x: 0,
    y: 0
};


var drawingMode = false;
var activateDraw = function activateDraw(e) {
    drawingMode = true;
    particles = Array.from(new Array(10), function () {
        return new Particle();
    });
    draw(e);
};
var disableDraw = function disableDraw(e) {
    drawingMode = false;
    particles = [];
};
var draw = function draw(e) {
    // console.log(drawingMode);
    if (!drawingMode) return;
    // console.log(e);
    particles.forEach(function (p) {
        //p.size = Math.max(10,e.movementX + e.movementY);
    });

};

canvas.addEventListener('mouseenter', activateDraw);
canvas.addEventListener('mousemove', function (e) {
    mousePos.x = e.layerX;
    mousePos.y = e.layerY;
    draw(e);
});

canvas.addEventListener('touchstart', activateDraw);
canvas.addEventListener('touchmove', function (e) {
    mousePos.x = e.touches[0].clientX;
    mousePos.y = e.touches[0].clientY;
    draw(e);
});

//canvas.addEventListener('touchstart', e => activateDraw);
//canvas.addEventListener('touchmove', e => draw);
//canvas.addEventListener('touchend', e => disableDraw);

loop();


function startStars(canvas) {

    //Helpers
    function lineToAngle(x1, y1, length, radians) {
        var x2 = x1 + length * Math.cos(radians),
            y2 = y1 + length * Math.sin(radians);
        return {x: x2, y: y2};
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
            {speed: 0.03, scale: 0.2, count: 320},
            {speed: 0.08, scale: 0.5, count: 50},
            {speed: 0.1, scale: 0.75, count: 30}
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
