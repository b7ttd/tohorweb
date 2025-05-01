const data = require('./data.json');
console.log(data);
const decodedHtml = atob(data.forms["body"]);
console.log(decodedHtml);

const data = fetch("website/webbody.json").then(response => { return response.json();}) 
