var list = document.getElementsByClassName('item');

for (var i = 0; i < list.length; i++) {
    list[i].addEventListener('dragstart', function() {
        event.dataTransfer.setData('text/plain', event.target.id);
    });
}

var container = document.getElementById('list-container');

container.addEventListener('dragover', function() {
    event.preventDefault();
});

container.addEventListener('drop', function() {
    var itemsList = [];
    var targetPositionNode = event.target;
    var parentNode = event.target.parentNode;
    var currentOnDragItem = document.getElementById(
        event.dataTransfer.getData("text")
    );

    for (var i = 0; i < list.length; i++) {
        itemsList.push({index: i, itemId: list[i].id});
    }

    var currentPositionNodeIndex = itemsList.find(function(el) {
        return currentOnDragItem.id === el['itemId'];
    })['index'];

    var targetPositionNodeIndex = itemsList.find(function(el) {
        return targetPositionNode.id === el['itemId'];
    })['index'];

    parentNode.removeChild(currentOnDragItem);

    if (currentPositionNodeIndex < targetPositionNodeIndex) {
        // insertAfter
        parentNode.insertBefore(currentOnDragItem, targetPositionNode.nextElementSibling);
    } else {
        parentNode.insertBefore(currentOnDragItem, targetPositionNode);
    }

    event.preventDefault();
});
