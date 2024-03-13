module.exports = function(request,response){
    let fs = require('fs');

    if(request.url === '/'){
        console.log('base url rendered');
        fs.readFile('views/movies.html', 'utf8', function (errors, contents){
                    response.writeHead(200, {'Content-Type': 'text/html'});  // send data about response
                    response.write(contents);  //  send response body
                    response.end(); // finished!
                });
    }else{
        let folder = directory(request.url);
        if(testFolderExist(folder)){
            let filename = getFilename(folder,request.url);
            makeResponse(folder,filename);
        }else{
            console.log('no such folder');
            response.writeHead(404);
            response.end('Folder not found!');
        }

    }

    /* return the index of the second dash of the url */
    function indexSecondDash(url){
        for(let i=1; i<url.length; i++){
            if(url[i] === '/'){
                return i;
            }
        }
    }

    /* return the directory of a target file of the url */
    function directory(url){
        let index = indexSecondDash(url);
        let folder = '';
        for(let i=1; i<index; i++){
            folder+=url[i];
        }
        return folder;
    }

    /* return boolean if the directory folder exist */
    function testFolderExist(folder){
        console.log(folder);
        let rootDirectory = fs.readdirSync('./');
        for(let i=0; i<rootDirectory.length; i++){
            if(rootDirectory[i] === folder){
                return true;
            }
        }
        return false;
    }

    /* return filename if the file exist in the directory */
    function getFilename(folder,url){
        let index = indexSecondDash(url);
        let filename = '';
        for(let i=index+1; i<url.length; i++){
            filename += url[i];
        }
        let listItems = fs.readdirSync('./'+folder);
        for(let i=0; i<listItems.length; i++){
            if(listItems[i].startsWith(filename)){
                return listItems[i];
            }
        }
        return null;
    }

    /* return the index of the first dot starting from end */
    function getDotIndex(filename){
        let indexOfDot;
        for(let i = filename.length-1; i>=0; i--){
            if(filename[i] == '.'){
                return i;
            }
        }            
    }

    /* return the file extension type */
    function getFileExtension(filename){
        let index = getDotIndex(filename);
        let fileExtension = '';
        for(let i=index; i<filename.length; i++){
            fileExtension += filename[i];
        }
        return fileExtension
    }

    /* return a content type base on the file extension */
    function getContentType(extension){
        if(extension === '.html'){
            return 'text/html';
        }else if(extension === '.css'){
            return 'text/css';
        }else if(extension === '.js'){
            return 'text/javascript';
        }else if(extension === '.png' || extension === '.jpg' || extension === '.jpeg'){
            return 'image/*';
        }else{
            return null;
        }
    }

    /* return the encode type */
    function getEncodeType(contentType){
        if(contentType == 'image/*'){
            return '';
        }else{
            return 'utf8';
        }
    }

    /* make a response */
    function makeResponse(folder,filename){
        if(filename){
            let path = folder+'/'+filename;
            let filetype = getFileExtension(filename);
            let contentType = getContentType(filetype);
            let encode = getEncodeType(contentType);
            console.log(encode);
            
            fs.readFile(path,encode,function (errors, contents){
                if(!errors){
                    response.writeHead(200, {'Content-Type': contentType});  // send data about response
                    response.write(contents);  //  send response body
                    response.end(); // finished!                        
                }else{
                    console.log('reading file error');
                    response.writeHead(500);
                    response.end('reading file error');
                }
            });  
        }else{
            console.log('file not found');
            response.writeHead(404);
            response.end('file not found');
        }
    }
}
