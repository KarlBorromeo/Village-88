const my_module = require('./my_module.js');
my_module.greet();
my_module.add(5,6);
const { URL } = require('url');

const urlString = 'https://example.com/search?q=query+string&page=2&sort=asc';
const parsedUrl = new URL(urlString);

console.log(parsedUrl.hostname); // 'example.com'
console.log(parsedUrl.pathname); // '/search'
console.log(parsedUrl.searchParams.get('q')); // 'query string'
