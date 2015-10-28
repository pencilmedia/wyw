# wyw
writeyourway.org


## INSTALL

##########################################
// Install the following:
``nodejs / npm``, ``npm install grunt-cli``, ``gem install sass``, ``npm install bower``,  "express", "express-generator"

NOTE:
EL CAPITAN OSX must install sass with " sudo gem install -n /usr/local/bin sass "


## How to install it
------------------------------------------

// Run the following in command line
``npm install`` maybe ``sudo npm install``

``bower install``
"sudo npm install express"
"sudo npm install express-generator"


## How to RUN it
------------------------------------------
open 2 terminals:

Term 1:
``npm start`` command from root folder of project ("proto" folder)

Term 2:
"grunt" command from root folder of project ("proto" folder)



## How to push to GIT/HEROKU
------------------------------------------
Through Terminal:

Push to "git push heroku master"





IN PROJECT: 
###########################################

Create the following hidden files:

.gitignore - paste the following: (git ignore these)

node_modules/.bin/**
node_modules/**
.*

!.bowerrc
!.gitignore
