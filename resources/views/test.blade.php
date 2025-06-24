<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple HTML Editor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .toolbar {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .editor {
            border: 1px solid #ccc;
            min-height: 300px;
            padding: 10px;
            overflow-y: auto;
        }
        button {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="toolbar">
    <button onclick="execCmd('bold')"><b>B</b></button>
    <button onclick="execCmd('italic')"><i>I</i></button>
    <button onclick="execCmd('underline')"><u>U</u></button>
    <button onclick="execCmd('insertOrderedList')">OL</button>
    <button onclick="execCmd('insertUnorderedList')">UL</button>
    <button onclick="execCmd('createLink')">Link</button>
    <button onclick="execCmd('insertImage')">Image</button>
</div>

<div class="editor" contenteditable="true"></div>

<script>
    function execCmd(command) {
        if (command === 'createLink') {
            const url = prompt("Enter the link URL:");
            document.execCommand(command, false, url);
        } else if (command === 'insertImage') {
            const url = prompt("Enter the image URL:");
            document.execCommand(command, false, url);
        } else {
            document.execCommand(command, false, null);
        }
    }
    function setFontSize(size) {
    document.execCommand('fontSize', false, size);
    const fontSizeMapping = { '1': '10px', '2': '12px', '3': '16px', '4': '24px', '5': '32px', '6': '48px', '7': '64px' };
    document.execCommand('fontSize', false, size);
    document.querySelector('.editor').innerHTML = document.querySelector('.editor').innerHTML.replace(/<font size="(\d+)">/g, function (match, p1) {
        return `<span style="font-size:${fontSizeMapping[p1]}">`;
    });
}
function saveContent() {
    const content = document.querySelector('.editor').innerHTML;
    localStorage.setItem('editorContent', content);
    alert("Content saved!");
}
window.onload = function () {
    const savedContent = localStorage.getItem('editorContent');
    if (savedContent) {
        document.querySelector('.editor').innerHTML = savedContent;
    }
}

</script>

</body>
</html>
