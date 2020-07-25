/*
A = y2 - y1
B = x1 - x2
C = Ax1 + By1 Slope in standard form

x = (B2 * C1 - B1 * C2) / (A1 * B2 - A2 * B1)
y = (A1 * C2 - A2 * C1) / (A1 * B2 - A2 * B1)
x2 = (B4 * C3 - B3 * C4) / (A3 * B4 - A4 * B3)
y2 = (A3 * C4 - A4 * C3) / (A3 * B4 - A4 * B3)
A1x + B1y = C1
A2x + B2y = C2
A3x + B3y = C3
A4x + B4y = C4

*/


window.onload = function () {
	var canvas = document.getElementById("canvas"),
		context = canvas.getContext("2d"),
		width = canvas.width = window.innerWidth,
		height = canvas.height = window.innerHeight;

	var p0 = { //uncomment this to return to points
		x: 100,
		y: 100
	},
		p1 = {
			x: 500,
			y: 500
		},
		p2 = {
			x: 600,
			y: 50
		},
		p3 = {
			x: 80,
			y: 600
		},

		/*var p0 = {
				x: 100,
				y: 100
			},
			p1 = {
				x: 600,
				y: 100
			},
			p2 = {
				x: 600,
				y: 600
			},
			p3 = {
				x: 100,
				y: 600
			},*/
		clickPoint;

	document.body.addEventListener("mousedown", onMouseDown);

	function onMouseDown(event) {
		clickPoint = getClickPoint(event.clientX, event.clientY);
		if (clickPoint) {
			document.body.addEventListener("mousemove", onMouseMove);
			document.body.addEventListener("mouseup", onMouseUp);
		}
	}

	function onMouseMove(event) {
		clickPoint.x = event.clientX;
		clickPoint.y = event.clientY;
		render();
	}

	function onMouseUp(event) {
		document.body.removeEventListener("mousemove", onMouseMove);
		document.body.removeEventListener("mouseup", onMouseUp);
	}

	function getClickPoint(x, y) {
		var points = [p0, p1, p2, p3];
		for (var i = 0; i < points.length; i++) {
			var p = points[i],
				dx = p.x - x,
				dy = p.y - y,
				dist = Math.sqrt(dx * dx + dy * dy);
			if (dist < 10) {
				return p;
			}

		}
	}


	render();

	function render() {
		context.clearRect(0, 0, width, height);
		context.font = "20px Arial";
		context.fillText("p0", p0.x, p0.y - 12);
		context.fillText("p1", p1.x, p1.y - 12);
		context.fillText("p2", p2.x, p2.y - 12);
		context.fillText("p3", p3.x, p3.y - 12);

		drawPoint(p0);
		drawPoint(p1);
		drawPoint(p2);
		drawPoint(p3);

		context.beginPath();
		context.moveTo(p0.x, p0.y);
		context.lineTo(p1.x, p1.y);
		context.moveTo(p2.x, p2.y); //Change lineTo to moveTo to treat  p2 just as a point
		context.lineTo(p3.x, p3.y);
		//context.lineTo(p0.x, p0.y); //comment this one out to remove the p3-p0 line
		context.stroke();

		var intersect = segmentIntersection(p0, p1, p2, p3);

		context.beginPath();
		context.arc(intersect.x, intersect.y, 20, 0, Math.PI * 2, false);
		context.strokeText("Intersection", intersect.x - 25, intersect.y - 25);
		context.stroke();
	}

	function drawPoint(p) {
		context.beginPath();
		context.arc(p.x, p.y, 10, 0, Math.PI * 2, false);
		context.fill();
	}


	function segmentIntersection(p0, p1, p2, p3) {
		var A1 = p1.y - p0.y,
			B1 = p0.x - p1.x,
			C1 = A1 * p0.x + B1 * p0.y,

			A2 = p3.y - p2.y,
			B2 = p2.x - p3.x,
			C2 = A2 * p2.x + B2 * p2.y;

		A3 = p2.y - p1.y,
			B3 = p1.x - p2.x,
			C3 = A3 * p1.x + B3 * p1.y;

		/*A4 = p3.y - p0.y,
		B4 = p0.x - p3.x,
		C4 = A4 */

		denom = A1 * B2 - A2 * B1;

		console.log("denominator: " + denom)
		var intersectX = (B2 * C1 - B1 * C2) / denom,
			intersectY = (A1 * C2 - A2 * C1) / denom,
			rx0 = (intersectX - p0.x) / (p1.x - p0.x),
			ry0 = (intersectY - p0.y) / (p1.y - p0.y);
		rx1 = (intersectX - p2.x) / (p3.x - p2.x);
		ry1 = (intersectY - p2.y) / (p3.y - p2.y);

		if (((rx0 >= 0 && rx0 <= 1) || (ry0 >= 0 && ry0 <= 1)) &&
			((rx1 >= 0 && rx1 <= 1) || (ry1 >= 0 && ry1 <= 1))) {
			console.log("Intersection: " + intersectX + ", " + intersectY);
			return {
				x: intersectX,
				y: intersectY
			};
		} else {
			return null;
		}
	}
};