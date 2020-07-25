let angle = 0, slider;

function setup() {
    createCanvas(400, 400);
    slider = createSlider(0, TWO_PI, PI / 4, 0.01);
}

function draw() {
    background(51);
    angle = slider.value();
    stroke(255);
    translate(200, height);
    branch(100);

}

function branch(len) {
    line(0, 0, 0, -len);
    translate(0, -len);
    if (len > 1) {
        push();
        rotate(angle * 0.6);
        branch(len * 0.67);
        pop();
        push();
        rotate(-angle * 0.78);
        branch(len * 0.67);
        pop();
    }
    line(0, 0, 0, -len * 0.67);
}