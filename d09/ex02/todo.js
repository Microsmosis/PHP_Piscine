var id_counter = 0;

if (document.cookie && document.cookie != "")
{
	let splitted_cookie = document.cookie.split(';');
	for (let i = 0; i < splitted_cookie.length; i++)
	{
		let key_value = splitted_cookie[i].split("=");
		addOldTask(key_value[1], key_value[0].trim());
		id_counter++;
	}
}

function newTask ()
{
	let secure_id = Math.random();
	let new_todo = prompt("Type in your new task.");
	if (new_todo.indexOf(';') >= 0)
	{
		new_todo = new_todo.replaceAll(';', '✅');
	}
	if (new_todo === "" || new_todo === null)
	{
		return ;
	}
	else
	{
		addTask(new_todo, id_counter, secure_id);
		addCookie(new_todo, id_counter, secure_id);
		id_counter++;
	}
}

function deleteTask (id)
{
	if(confirm("You are removing a task, are you sure?"))
	{
		let list = document.getElementById("ft_list");
		let div = document.getElementById(id);
		list.removeChild(div);
		document.cookie = id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	}
}

function addOldTask(new_todo, id_counter)
{
	let parent_node = document.getElementById("ft_list");
	let first_child = parent_node.firstChild;
	let new_node = document.createElement("div");
	new_node.setAttribute("id", id_counter);
	new_node.setAttribute("onclick", "deleteTask(this.id)");
	let text = document.createTextNode(new_todo);
	let list_elem = document.createElement("li");
	list_elem.appendChild(text);
	new_node.appendChild(list_elem);
	parent_node.insertBefore(new_node, first_child);
}

function addTask(new_todo, id_counter, secure_id)
{
	let parent_node = document.getElementById("ft_list");
	let first_child = parent_node.firstChild;
	let new_node = document.createElement("div");
	new_node.setAttribute("id", id_counter + new_todo + secure_id);
	new_node.setAttribute("onclick", "deleteTask(this.id)");
	let text = document.createTextNode(new_todo);
	let list_elem = document.createElement("li");
	list_elem.appendChild(text);
	new_node.appendChild(list_elem);
	parent_node.insertBefore(new_node, first_child);
}

function addCookie(new_todo, id_counter, secure_id)
{
	document.cookie = id_counter + new_todo + secure_id + "=" + new_todo + "; expires=Thu, 18 Dec 2050 12:00:00 UTC; secure; path=/;";
}