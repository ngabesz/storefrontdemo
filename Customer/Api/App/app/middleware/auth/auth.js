const jwt = require("jsonwebtoken");
const fs = require('fs');
const config = process.env;

const verifyToken = (req, res, next) => {
    var tokenArray = req.headers.authorization.split(" ");
    const token = tokenArray[1];

    if (!token) {
        return res.status(403).send("A token is required for authentication");
    }

    try {
        cert = fs.readFileSync(__dirname + '/../../../keys/public.pem')
        const tokenContent = jwt.verify(token, cert, {ignoreNotBefore:true});

        var userScopes = tokenContent.scopes;
        var requiredScopes = req.requiredScopes;

        if (requiredScopes.every(scope => userScopes.includes(scope))) {
            req.user = tokenContent;
            next();
        } else {
            res.status(403).send("Forbidden");
        }

    } catch (err) {
        console.log(err);
        return res.status(401).send("Invalid Token");
    }
};

module.exports = verifyToken;