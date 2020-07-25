var text = "All generalizations are false, including this one. \nMarc Twain.";

function drawBubble(ctx, x, y, w, h, radius) {
    wrapText(ctx, text, x + 20, y + 30, 200, 25);
    var r = x + w;
    var b = y + h;
    ctx.beginPath();
    ctx.strokeStyle = "black";
    ctx.lineWidth = "2";
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + radius / 2, y - 10);
    ctx.lineTo(x + radius * 2, y);
    ctx.lineTo(r - radius, y);
    ctx.quadraticCurveTo(r, y, r, y + radius);
    ctx.lineTo(r, y + h - radius);
    ctx.quadraticCurveTo(r, b, r - radius, b);
    ctx.lineTo(x + radius, b);
    ctx.quadraticCurveTo(x, b, x, b - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.stroke();
}


function wrapText(context, text, x, y, line_width, line_height) {
    var line = '';
    var paragraphs = text.split('\n');
    for (var i = 0; i < paragraphs.length; i++) {
        var words = paragraphs[i].split(' ');
        for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = context.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > line_width && n > 0) {
                context.fillStyle = "white";
                context.fillText(line, x, y);
                line = words[n] + ' ';
                y += line_height;
            } else {
                line = testLine;
            }
        }
        context.fillText(line, x, y);
        y += line_height;
        line = '';
    }
}


function dispQuote(canvas, ctx) {
    drawBubble(ctx, 10, 60, 220, 90, 20);
}