var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { 
    title: 'writeyourway.org',
    h1: 'Home',
    classname: 'hmpg'
  });
});

/* GET about. */
router.get('/about', function(req, res, next) {
  res.render('about', {
    title: 'writeyourway.org : About',
    h1: 'About',
    classname: 'about'
  });
});

/* GET services. */
router.get('/services', function(req, res, next) {
  res.render('services', {
    title: 'writeyourway.org : Services',
    h1: 'Services',
    classname: 'services'
  });
});

/* GET history. */
router.get('/history', function(req, res, next) {
  res.render('history', {
    title: 'writeyourway.org : History',
    h1: 'History',
    classname: 'history'
  });
});

/* GET contact. */
router.get('/contact', function(req, res, next) {
  res.render('contact', {
    title: 'writeyourway.org : Contact',
    h1: 'Contact',
    classname: 'contact'
  });
});

module.exports = router;
