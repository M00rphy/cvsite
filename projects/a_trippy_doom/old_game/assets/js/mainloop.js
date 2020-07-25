/*jslint nomen: true, vars: true */
/*jshint scripturl: true, -W079 */
/*global yad: true, window: true, alert: true, jQuery: true, $: true*/
if (atd === undefined) {
    var atd = {};
}

atd.SCREEN_ID = "screen";
atd.MINIMAP_ID = "minimap";
atd.DEBUG_ID = "debug";
atd.SCREEN_WIDTH = 640;
atd.SCREEN_HEIGHT = 480;
atd.DEBUG = false;

// Sprite lookup
atd.sprites = {};

// Quick lookup for player
// Note: This object does not have the current position
//       use the state in the controller for this.
atd.player = undefined;

// Stats
atd.stats = {
    latest_map: 1,
    ET_kills: 0,
    demon_kills: 0,
    start_time: undefined
};

atd.main = {

    init: function () {
        "use strict"

        if (atd.main._screenInit === undefined) {
            var screen = ge.$(atd.SCREEN_ID),
                height = window.innerHeight - 20;
            screen.width = atd.SCREEN_WIDTH;
            screen.height = atd.SCREEN_HEIGHT;
            screen.style.width = (height * 4 / 3) + "px";
            screen.style.height = height + "px";
            atd.main._screenInit = true;
        }

        atd.main.showIntro();
    },

    showIntro: function () {
        "use strict"

        var ctx = atd.main._showText("A trippy Doom.", "black", true, "red", 50),
            text = "Press space to continue ...",
            tw = ctx.measureText(text).width,
            image = new Image(),
            ix, iw, iscale;

        // Reset all ids
        ge.$(atd.DEBUG_ID).innerHTML = "";
        ge.$(atd.SCREEN_ID).innerHTML = "";
        ge.$(atd.MINIMAP_ID).innerHTML = "";

        image.onload = function () {
            iscale = Math.floor(atd.SCREEN_WIDTH / 2);
            ix = (atd.SCREEN_WIDTH - iscale) / 2;
            iw = iscale;

            ctx.drawImage(image, 0, 0, 64, 64,
                ix, 80 - Math.floor(iscale * 0.05),
                iw, iw);

            ctx.fillText(text, atd.SCREEN_WIDTH / 2 - tw / 2, atd.SCREEN_HEIGHT - 50);

            document.onkeydown = ge.bind(function (e) {
                e = e || window.event;
                if (e.keyCode === 32) {
                    document.onkeydown = null;
                    atd.main.showInstructions();
                }
            });
        };
        image.src = "assets/graphix/ET.png";
    },

    showInstructions: function () {
        "use strict";

        var ctx = atd.main._showText("A trippy Doom.", "black", true, "red", 50),
            text = "Press space to continue ...",
            tw = ctx.measureText(text).width,
            image = new Image(),
            image2 = new Image(),
            ix, iw, iscale;

        ctx.fillText(text, atd.SCREEN_WIDTH / 2 - tw / 2, atd.SCREEN_HEIGHT - 50);

        image.src = "assets/graphix/ET.png";
        image.onload = function () {
            ctx.drawImage(image, 0, 0, 64, 64,
                Math.floor(atd.SCREEN_WIDTH * 0.2), 80, 64, 64);
        }

        image2 = new Image();
        image2.src = "assets/graphix/demon.png";
        image2.onload = function () {
            ctx.drawImage(image2, 0, 0, 64, 64,
                Math.floor(atd.SCREEN_WIDTH * 0.2), 160, 64, 64);
        };

        ctx.font = "bold 16px Arial";
        ctx.fillStyle = "green";
        text = "<Cursor Keys>";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.27) - ctx.measureText(text).width, 270);
        text = "<Shift>";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.27) - ctx.measureText(text).width, 310);
        text = "<Y, Z or Space Bar>";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.27) - ctx.measureText(text).width, 350);

        ctx.fillStyle = "lightblue";
        text = "Shoot these ...";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.33), 120);
        text = "... and these";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.33), 200);
        text = "Move around";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.33), 270);
        text = "Strafe";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.33), 310);
        text = "Shoot";
        ctx.fillText(text, Math.floor(atd.SCREEN_WIDTH * 0.33), 350);

        document.onkeydown = ge.bind(function (e) {
            e = e || window.event;
            if (e.keyCode === 32) {
                document.onkeydown = null;
                atd.main.initEngine();
            }
        });
    },

    initEngine: function () {
        "use strict"

        // Reset all ids
        ge.$(atd.DEBUG_ID).innerHTML = "";
        ge.$(atd.SCREEN_ID).innerHTML = "";
        ge.$(atd.MINIMAP_ID).innerHTML = "";

        if (atd.scene["map" + atd.stats.latest_map] === undefined) {
            // No more maps available - end the game
            atd.main.gameFinished();
            return;
        }

        atd.main._showText("Level " + atd.stats.latest_map + " - Get Psyched!", "black", true);

        atd.main._playSound("assets/sfx/get_ready1.ogg");

        window.setTimeout(function () {
            atd.main.start();
        }, 500);
    },

    start: function () {
        "use strict";

        if (atd.stats.start_time === undefined) {
            atd.stats.start_time = new Date().getTime();
        }

        atd.player = new atd.Player();

        var height = window.innerHeight - 20,
            controller = new ge.MainController(atd.SCREEN_ID, atd.MINIMAP_ID, {
                screenWidth: atd.SCREEN_WIDTH,
                screenHeight: atd.SCREEN_HEIGHT,
                screenElementWidth: height * 4 / 3,
                screenElementHeight: height,
                wallTextureAtlas: "assets/graphix/walls.jpg",
                wallTextureMapping: {
                    "1": [0, 0], // Texture tiles
                    "2": [0, 64],
                    "3": [0, 128],
                    "4": [0, 192],
                    "5": [64, 0],
                    "6": [64, 64],
                    "7": [64, 128],
                    "8": [64, 192],
                    "9": [128, 0],
                    "10": [128, 64],
                    "11": [128, 128],
                    "12": [128, 192],
                    "13": [192, 0],
                    "14": [192, 64],
                    "15": [192, 128],
                    "16": [192, 192],
                    "17": [256, 0],
                    "18": [256, 64],
                    "19": [256, 128],
                    "20": [256, 192],
                    "21": [320, 0],
                    "22": [320, 64],
                    "23": [320, 128],
                    "24": [320, 192],
                    "25": [384, 0],
                    "26": [384, 64],
                    "27": [384, 128],
                    "28": [384, 192],
                    "29": [448, 0],
                    "30": [448, 64],
                    "31": [448, 128],
                    "32": [448, 192]
                },
                ceilingSolidColor: "#8A0808",
                floorSolidColor: "#1C1C1C",
                drawHandler: ge.bind(atd.player.draw, atd.player),
                eventHandler: atd.player
            }, atd.DEBUG ? atd.DEBUG_ID : undefined);

        // Make sure player has reference to controller
        atd.player._controller = controller;
        atd.main.controller = controller;

        // Load the correct map
        var scene = atd.scene["map" + atd.stats.latest_map];

        for (var i = 0; i < scene.ETs.length; i++) {
            var ET = scene.ETs[i];
            for (var j = 0; j < ET[0]; j++) {
                var id = "ET" + i + "-" + j;
                atd.sprites[id] = new atd.ET(id, ET[1], ET[2], controller);
            }
        }

        for (i = 0; i < scene.demons.length; i++) {
            var demon = scene.demons[i],
                id = "demon" + i;

            atd.sprites[id] = new atd.Demon(id, demon[0], demon[1], controller);
        }

        controller.start(scene.map, {
            x: 1.5,
            y: 1.5
        });
    },

    checkWin: function () {
        "use strict";

        for (var id in atd.sprites) {
            var sprite = atd.sprites[id];
            if (!sprite.isDead()) {
                return;
            }
        }

        // Stop the game
        window.setTimeout(function () {
            atd.main.controller.stop();
        }, 200);
        window.setTimeout(atd.main.stageCleared, 500);
    },

    stageCleared: function () {

        atd.main._showText("Stage Cleared", "green");


        window.setTimeout(function () {
            atd.sprites = {};

            // Reset health every level to make it a bit more fair until life system added.
            atd.Player.initial_health = 100;
            atd.stats.latest_map++;

            atd.player = undefined;
            atd.main.initEngine();
        }, 2000);
    },

    gameOver: function () {
        "use strict";

        // Stop the game
        atd.main.controller.stop();

        atd.main._showText("Game Over!", "red");

        atd.main._playSound("assets/sfx/atd_game-over.ogg");

        window.setTimeout(atd.main._showStats, 8000);
    },

    gameFinished: function () {
        "use strict";

        // Stop the game
        atd.main.controller.stop();

        atd.main._showText("You finished the game! \
        You can go back to your daily life \
        Thanks for playing, enjoy the sun outside :D.", "darkblue", true);

        atd.main._playSound("assets/sfx/atd_finish.ogg");

        window.setTimeout(atd.main._showStats, 9000);
    },

    _showText: function (text, background, solid, foreground, yPos) {
        "use strict";
        var screen = ge.$(atd.SCREEN_ID),
            ctx = screen.getContext("2d"),
            tw, text, y;

        if (solid !== true) {
            ctx.globalAlpha = 0.7;
        }
        ctx.fillStyle = background;
        ctx.fillRect(0, 0, atd.SCREEN_WIDTH, atd.SCREEN_HEIGHT);
        ctx.globalAlpha = 1;

        ctx.fillStyle = foreground === undefined ? "white" : foreground;
        ctx.font = "bold 24px Arial";
        tw = ctx.measureText(text).width;
        y = yPos === undefined ? atd.SCREEN_HEIGHT / 2 - 12 : yPos;
        ctx.fillText(text, atd.SCREEN_WIDTH / 2 - tw / 2, y);

        return ctx;
    },

    _showStats: function () {
        "use strict";
        var timeDelta = new Date().getTime() - atd.stats.start_time;
        alert("ET Kills: " + atd.stats.ET_kills +
            "\nDemon Kills: " + atd.stats.demon_kills +
            "\nTime: " + atd.main.timeString(Math.floor(timeDelta / 1000)));

        // Reset stats
        atd.stats = {
            latest_map: 1,
            ET_kills: 0,
            demon_kills: 0,
            start_time: undefined
        };
        atd.Player.initial_health = 100;

        atd.main.showIntro();
    },

    _playSound: function (sound) {
        var audio = new Audio();
        audio.src = sound;
        audio.play();
    },


    timeString: function (seconds) {
        "use strict";
        var numhours = Math.floor(((seconds % 31536000) % 86400) / 3600),
            numminutes = Math.floor((((seconds % 31536000) % 86400) % 3600) / 60),
            numseconds = (((seconds % 31536000) % 86400) % 3600) % 60;
        return (numhours < 10 ? "0" : "") + numhours + ":" +
            (numminutes < 10 ? "0" : "") + numminutes + ":" +
            (numseconds < 10 ? "0" : "") + numseconds;
    }
};

atd.Player = ge.Class.create(ge.default_eventHandler, {

    init: function () {
        "use strict";
        this._gunSprite = new Image();
        this._gunSprite.src = "assets/graphix/grenade.png";

        // Two sounds to cope with the case if the player
        // fires again before the sound finished
        this._gunSound1 = new Audio();
        this._gunSound1.src = "assets/sfx/grenade.ogg";
        this._gunSound2 = new Audio();
        this._gunSound2.src = "assets/sfx/grenade.ogg";

        this._animationOffset = 0;

        // Crosshair
        this._screenMiddle = atd.SCREEN_WIDTH / 2;
        this._screenMiddleY = atd.SCREEN_HEIGHT / 2;
        this._killZoneStart = this._screenMiddle - 48;
        this._killZoneEnd = this._screenMiddle + 48;
        this._killZoneStartY = this._screenMiddleY - 48;
        this._killZoneEndY = this._screenMiddleY + 48;

        // Player health
        this.health = atd.Player.initial_health;

        // Make sure this object is bound to onkeydown
        this.onkeydown = ge.bind(this.onkeydown, this);
    },

    // Draw function which is called by the engine
    //
    draw: function (ctx, state, sprites) {
        "use strict";

        // Draw health
        if (this.health > 75) {
            ctx.fillStyle = "green";
        } else if (this.health > 40) {
            ctx.fillStyle = "yellow";
        } else {
            ctx.fillStyle = "red";
        }
        ctx.font = "bold 24px Arial";
        ctx.fillText("\u2764 " + this.health, atd.SCREEN_WIDTH - 75, 25);

        // Draw the gun with the current animation offset
        ctx.drawImage(this._gunSprite,
            // Which part of the texture should be drawn
            this._animationOffset,
            // Vertical offset on texture image
            0,
            // Texture width
            atd.AnimatedSprite.FRAME_WIDTH,
            64, // Texture height (default)
            // Horizontal position
            atd.Player.GUN_POS_X,
            // Vertical position
            atd.Player.GUN_POS_Y,
            atd.AnimatedSprite.FRAME_WIDTH * atd.Player.GUN_SCALE,
            64 * atd.Player.GUN_SCALE);

        if (this._shotFrom !== undefined) {
            // Confirm that we are still seeing the shooting sprite
            for (var i = sprites.length - 1; i >= 0; i--) {
                if (sprites[i].id === this._shotFrom.id) {

                    // Calculate distance
                    var vx = sprites[i].x - state.player.x,
                        vy = sprites[i].y - state.player.y,
                        distance = Math.sqrt(vx * vx + vy * vy);

                    // Formular to decide if the player was hit
                    if (Math.ceil(Math.random() * distance) > distance / 3) {
                        var hit = Math.floor(44 / distance);
                        if (this.health <= hit) {
                            this.kill(ctx);
                            return;
                        }
                        this.health -= hit;
                        this._ouch = 5;
                    }
                }
            }
            this._shotFrom = undefined;
        }

        if (this._ouch !== undefined) {
            ctx.globalAlpha = 0.2;
            ctx.fillStyle = "red";
            ctx.fillRect(0, 0, atd.SCREEN_WIDTH, atd.SCREEN_HEIGHT);
            ctx.globalAlpha = 1;
            this._ouch = this._ouch === 0 ? undefined : this._ouch - 1;
        }

        if (atd.DEBUG) {
            ctx.strokeRect(this._killZoneStart, 0, this._killZoneEnd - this._killZoneStart, atd.SCREEN_HEIGHT, this._killZoneStartY, 0, this._killZoneEndY, 0, this._killZoneEndY - this._killZoneStartY, atd.SCREEN_WIDTH);
        }

        // Check if we should do hit detection
        if (this._firing) {

            // Go through each sprite and check if we have a hit
            for (var i = sprites.length - 1; i >= 0; i--) {

                var sprite = sprites[i];

                if (sprite.hitList.length > 0) {
                    // We hit the sprite - now check if the aim was good enough ...

                    var x1 = sprite.hitList[0][2];
                    var x2 = x1 + sprite.hitList[0][3];
                    if ((x1 <= this._killZoneEnd && x2 >= this._killZoneEnd) ||
                        (x1 <= this._killZoneStart && x2 >= this._killZoneStart)) {

                        if (!atd.sprites[sprite.id].isDead()) {
                            // We hit the sprite in the killzone
                            atd.sprites[sprite.id].kill();
                            // The firing had its effect - no other effects possible
                            this._firing = false;
                            break;
                        }
                    }

                    if (atd.DEBUG) {
                        ctx.strokeRect(x1, 0, x2 - x1, atd.SCREEN_HEIGHT);
                    }
                }
            }
        }
    },

    fire: function (state) {
        "use strict";

        if (this._fireInProgress === true) {
            return;
        }
        this._fireInProgress = true;

        var fireLoop = ge.bind(function () {
            this._animationOffset += atd.AnimatedSprite.FRAME_WIDTH;

            if (this._animationOffset > 64 && this._animationOffset < 192) {
                if (this._firing === undefined) {
                    this._firing = true;
                }
            } else {
                this._firing = undefined;
            }

            if (this._animationOffset <= 320) {
                window.setTimeout(fireLoop, 100);
            } else {
                this._animationOffset = 0;

                // Wait a bit before we can refire
                window.setTimeout(ge.bind(function () {
                    this._animationOffset = 0;
                    this._fireInProgress = undefined;
                }, this), 320);
            }
        }, this);

        if (this._gunSound1.paused) {
            if (window.chrome) this._gunSound1.load()
            this._gunSound1.play();
        } else {
            if (window.chrome) this._gunSound2.load()
            this._gunSound2.play();
        }

        fireLoop();
    },

    // Key handler for firing
    //
    onkeydown: function (state, e) {
        "use strict";

        e = e || window.event;
        switch (e.keyCode) {
            case 32: // Space
            case 89: // y
            case 90: // z
                this.fire(state);
                break;
        }

        this._super(state, e);
    },

    // Player was shot at
    //
    // sprite - Sprite which is shooting at the player
    //
    hit: function (sprite) {
        "use strict";
        this._shotFrom = sprite;
    },

    // Player was killed
    //
    kill: function (ctx) {
        "use strict";
        atd.main.gameOver();
    }
});
atd.Player.GUN_SCALE = 2;
atd.Player.GUN_POS_X = Math.floor(atd.SCREEN_WIDTH * 0.4);
atd.Player.GUN_POS_Y = atd.SCREEN_HEIGHT - 64 * atd.Player.GUN_SCALE;
atd.Player.initial_health = 100;

atd.ET = ge.Class.create(atd.AnimatedSprite, atd.MovingSprite, {

    init: function (id, x, y, controller) {
        "use strict";

        this._dead = false;
        this._deadSound = new Audio();
        this._deadSound.src = "assets/sfx/small_creature.ogg";

        this._controller = controller;
        this._state = {
            id: id,
            x: x,
            y: y,
            spriteAtlas: "assets/graphix/ET.png",
            isMoving: true,
            drawOnMinimap: true,
            minimapColor: "green",
            spriteScaleX: 0.5,
            spriteScaleY: 0.5,
            spriteOffsetX: 64,
            speed: 1
        };
        controller.addSprite(this._state);

        this.runAnimation(0, 320, {
            speed: 200,
            oscillate: true
        });

        this.runMove(1000);
    },

    move: function () {
        "use strict";

        if (this._dead) {
            return false;
        }

        this._state.rot = Math.floor((Math.random() * Math.PI * 2));

        return !this._dead;
    },

    isDead: function () {
        "use strict";
        return this._dead;
    },

    // ET died
    //
    kill: function () {
        "use strict";

        this._dead = true;
        this._state.speed = 0;
        this._state.minimapColor = "white";
        this._deadSound.play();

        this.runAnimation(256, 576, {
            speed: 80,
            singlerun: true
        });


        // Adjust stats
        atd.stats.ET_kills++;

        atd.main.checkWin();
    }
});

atd.Demon = ge.Class.create(atd.AnimatedSprite, atd.MovingSprite, {

    init: function (id, x, y, controller) {
        "use strict";

        this.id = id;
        this._dead = false;
        this._shoot = undefined;
        this._playerAware = false;
        this._playerSeenSound = new Audio();
        this._playerSeenSound.src = "assets/sfx/achtung.ogg";
        this._deadSound = new Audio();
        this._deadSound.src = "assets/sfx/demon_dead.ogg";
        this._shotSound = new Audio();
        this._shotSound.src = "assets/sfx/demon_shot.ogg";

        this._controller = controller;
        this._state = {
            id: id,
            x: x,
            y: y,
            spriteAtlas: "assets/graphix/demon.png",
            isMoving: true,
            drawOnMinimap: true,
            minimapColor: "violet",
            spriteOffsetX: 0,
            speed: 0
        };
        controller.addSprite(this._state);

        this.runMove(1000);
    },

    move: function () {
        "use strict";

        if (this._dead) {
            return false;
        }

        var playerSeen = this._state.hitList.length !== 0;

        if (!this._playerAware && !playerSeen) {
            // Do nothing if we don't see the player and we are not aware of him
            this._state.speed = 0;
            return;
        }
        if (this._playerAware === false) {
            // We see the player for the first time
            this._playerSeenSound.play();
            this._playerAware = true;

            // NOTE: Activate this for extra difficulty
            // this._shoot = true;
        }

        // Calculate vector on the player
        var vp_x = this._controller._state.player.x - this._state.x,
            vp_y = this._controller._state.player.y - this._state.y;

        // Calculate angle phi on the player
        this._state.rot = Math.atan2(vp_y, vp_x);

        if (!playerSeen || this._shoot === undefined) {
            this._state.speed = 0.5;
            this.runAnimation(64, 320, {
                speed: 200,
                oscillate: false
            });
            this._shoot = true;

        } else {
            // We see the player and we can shoot

            // We need to stop
            this._state.speed = 0;

            window.setTimeout(ge.bind(function (oldx, oldy) {
                    var vp_x = oldx - this._controller._state.player.x,
                        vp_y = oldy - this._controller._state.player.y,
                        move_dist = Math.sqrt(vp_x * vp_x + vp_y * vp_y);

                    this._shotSound.play();

                    // If the player didn't move while the enemy is shooting he was "shot at"
                    if (move_dist < 0.5) {
                        // During the shoot animation tell the player that he was shot at.
                        // Player object decides if it was hit.
                        atd.player.hit(this);
                    }
                }, this, this._controller._state.player.x, this._controller._state.player.y),
                450);

            // Run the Demon shoot animation
            this.runAnimation(640, 768, {
                speed: 200,
                singlerun: true
            }, ge.bind(function () {
                this._state.spriteOffsetX = 0;
            }, this));

            this._shoot = undefined;
        }

        return !this._dead;
    },

    isDead: function () {
        "use strict";
        return this._dead;
    },


    // Demon died
    //
    kill: function () {
        "use strict";

        this._dead = true;
        this._state.speed = 0;
        this._state.minimapColor = "red";
        this._deadSound.play();

        // Adjust stats
        atd.stats.demon_kills++;

        this.runAnimation(320, 576, {
            speed: 150,
            singlerun: true
        }, ge.bind(function () {
            this._state.spriteOffsetX = 576;
        }, this));

        atd.main.checkWin();
    }
});