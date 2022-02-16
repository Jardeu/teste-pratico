const ul = document.getElementById("add-tags");
const input = document.getElementById("tags");
const names = document.getElementById("tagNames");

let tags = (names.value != '') ? JSON.parse(names.value) : [];
console.log(tags);

function createTag() {
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag => {
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
}

function remove(element, tag) {
    let index = tags.indexOf(tag);

    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];

    names.value = JSON.stringify(tags);

    element.parentElement.remove();
}

function addTag(e) {
    if (e.key == "Enter") {
        let tag = e.target.value.replace(/\s+/g, ' ');
        if (tag.length > 1 && !tags.includes(tag)) {
            tag.split(',').forEach(tag => {
                tags.push(tag);
                createTag();
                names.value = JSON.stringify(tags);
            });
        }
        e.target.value = "";
    }
}

input.addEventListener("keyup", addTag);

document.addEventListener("keydown", function (e) {

    if (e.key == "Enter") {

        e.preventDefault();

    }

});