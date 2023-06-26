const auth = require('../middleware/auth/auth')
const customers = require('../controllers/customer.controller')
module.exports = app => {
  const customers = require("../controllers/customer.controller.js");

  var router = require("express").Router();

  router.post("/", function(req, res, next) {
    req.requiredScopes = ["customer_write"];
    next();
  });

  router.get("/", function(req, res, next) {
    req.requiredScopes = ["customer_read"];
    next();
  });

  router.get("/:id", function(req, res, next) {
    req.requiredScopes = ["customer_read"];
    next();
  });

  router.post("/by_email", function(req, res, next) {
    req.requiredScopes = ["customer_read"];
    next();
  });

  router.put("/:id", function(req, res, next) {
    req.requiredScopes = ["customer_write"];
    next();
  });

  router.delete("/", function(req, res, next) {
    req.requiredScopes = ["customer_write"];
    next();
  });

  router.post("/", auth, customers.create);

  router.get("/", auth, customers.findAll);

  router.post("/auth", customers.auth);

  router.post("/by_email", auth,  customers.getByEmail);

  router.get("/:id", auth, customers.findOne);

  router.put("/:id", auth, customers.update);

  router.delete("/", auth, customers.deleteAll);

  app.use('/api/customers', router);
};
