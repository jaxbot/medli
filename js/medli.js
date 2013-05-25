/*
 * Medli.js
 * Main entry point for the board system 
 */

var cachedDOM = [];

// Because I'm lazy. And it does caching, so that's good, right?
var _g = function(id) { return cachedDOM[id] || (cachedDOM[id] = document.getElementById(id)); }

var pinItems = [];
var categories = [];

function renderPinItem(item) {
	var e = document.createElement("div");

	e.className = "pinitem";
	e.setAttribute("data-category", item.category);
	e.innerHTML = item.content;
	e.onclick = function() { top.location.href = item.action };

	_g("pincontainer").appendChild(e);

	pinItems.push(item);
	if (categories.indexOf(item.category) === -1) {
		categories.push(item.category);
		_g("linkscontainer").innerHTML += " <a href='#" + item.category + "'>" + item.category + "</a>";
	}
}

function renderBoard() {
	var filter = location.hash.substring(1);

	var x = 0;
	var y = [];
	var width = 270;
	var maxwidth = window.innerWidth || document.documentElement.clientWidth;
	var padding = 40;

	var children = _g("pincontainer").childNodes;
	for (var i = 0; i < children.length; i++) {
		if (filter && filter.split(",").indexOf(children[i].getAttribute("data-category")) === -1)
		{
			children[i].style.display = "none";
			continue;
		}
		children[i].style.display = "block";

		if (!y[x]) y[x] = 0;

		children[i].style.left = (x * (width + padding)) + "px";
		children[i].style.top = y[x] + "px";
		y[x] += children[i].clientHeight + padding; 
		x++;
		if ((x * (width + padding) + width) >= maxwidth) {
			x = 0;
		}
	}
}

