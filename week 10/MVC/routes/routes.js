const express = require('express');
const router = express.Router();
const controller = require('../src/controller/homeController');

router.get('/',controller.index())
router.post('/result',controller.result());
router.get('/fetchCars',controller.fetchCars());
module.exports = router;