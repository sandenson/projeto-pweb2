function update() {
    const imageHandler = document.getElementById("image-handler");
    const list = imageHandler.getElementsByTagName("input");
    alert(list.length - 1)
    list[list.length - 1].addEventListener("change", (e) => {
        const clone = e.target.cloneNode(false);
        clone.value = "";
        imageHandler.appendChild(clone);
        const Nclone = e.target.cloneNode(true);
        imageHandler.replaceChild(Nclone, e.target);
        update();
    });
}
update();