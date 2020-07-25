var angle = 0;
var slider;

function setup() {
  createCanvas(640, 480);
  //slider = createSlider(0, TWO_PI, PI / 7.5, 0.01);
}

function draw() {
  background(51);
  //angle = slider.value();
  angle = PI / 6;
  stroke(255);
  translate(width / 2, height);
  branch(150);
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

  //line(0, 0, 0, -len * 0.67);
}
