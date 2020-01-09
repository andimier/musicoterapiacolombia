var textLength = document.querySelector('#caja2') && document.querySelector('#caja2').innerText.length;

function parseLink(link, text) {
    var hRef = link.match(/href=[-_\/\w":.;?&=]+/);

    return '<a ' + hRef + '>' + text + '</a>';
}

function getLinksText(link) {
    var div = document.createElement('DIV');
    div.innerHTML = link;
    var text = div.innerText;

    return text;
}

function getLinks(html, links) {
    var str = html;
    var linksLength = html.match(/<a/g) && html.match(/<a/g).length;

    if (linksLength) {
        for (var i = 0; i < linksLength; i++) {
            var startIndex = str.indexOf('<a');
            var endIndex = str.indexOf('</a>') + 4;
            var link = str.slice(startIndex, endIndex);
            var str = str.slice(endIndex);

            var text = getLinksText(link);
            var parsedLink = parseLink(link, text);

            if (text) {
                links.push({'link': parsedLink, 'text': text});
            }
        }

        return links;
    }
}

function replaceText(str, links) {
    var text = str;

    for (var i = 0; i < links.length; i++) {
        text = text.replace(links[i].text, links[i].link);
    }

    return text;
}

function replaceLineBreaks(str) {
    var output = str;
    var newLinesReplacements = [
        /\n/g,
        /\r/g,
        /\v/,
    ];

    for (var i = 0; i < newLinesReplacements.length; i++){
        output = output.replace(newLinesReplacements[i], '<br>');
    }

    return output;
}

document.querySelector('#text-input-box').addEventListener('input', function() {
    var text = this.innerText;

    if ((text.length - textLength) > 1) {
        var html = this.innerHTML;
        var links = getLinks(html, []);

        if (links) {
            var newText = replaceLineBreaks(
                replaceText(text, links)
            );

            this.innerHTML = newText + '<br>';
        }
    }

    textLength = this.innerText.length;
});

document.querySelector('#save-text-btn').addEventListener('click', function() {
    var form = document.getElementById("text-edit-form");
    var text = document.querySelector('#text-input-box').innerHTML;

    form.elements['item-text'].value = text.trim();
    form.submit();
});