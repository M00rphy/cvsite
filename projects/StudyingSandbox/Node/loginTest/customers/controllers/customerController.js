const controller = {};
const bcrypt = require('bcrypt');
const sprintf = require('sprintf-js').sprintf,
    vsprintf = require('sprintf-js').vsprintf;

controller.list = (req, res) => {
    req.getConnection((err, conn) => {
        conn.query('SELECT * FROM customersT', (err, customers) => {
            if (err) {
                res.json(err);
            }
            res.render('customers', {
                data: customers
            });
        });
    });
};
controller.save = async (req, res) => {
    let pass = req.body.password;
    let phone = req.body.phone;
    let cost = 10;
    let raw_salt_len = 16;
    let required_salt_len = 22;
    let hashformat = sprintf("$2y$%02d$", cost);
    let salt;
    let hash = hashformat;

    /*
Cost = 10;
raw salt len = 16
required salt len = 22
hashformat = sprintf("$2y$%02d$", $cost);
salt = (string) $options['salt'];
salt = substr($salt, 0, $required_salt_len);
hash = hashFormat + salt;
$ret = crypt($password, $hash);

if (!is_string($ret) || strlen($ret) <= 13) {
            return false;
        }

 */

    const hashedPassword = await bcrypt.hash(pass, 0);
    const hashedPassword2 = await bcrypt.hash(phone, 0);
    const data = req.body;
    data.password = hashedPassword;
    data.phone = hashedPassword2;
    console.log("customer:")
    console.log(req.body)
    req.getConnection((err, connection) => {
        const query = connection.query('INSERT INTO customersT set ?', data, (err, customer) => {
            console.log(customer)
            res.redirect('/');
        })
    })
};

controller.edit = (req, res) => {
    const {id} = req.params;
    req.getConnection((err, conn) => {
        conn.query("SELECT * FROM customersT WHERE memberID = ?", [id], (err, rows) => {
            res.render('customers_edit', {
                data: rows[0]
            })
        });
    });
};

controller.update = (req, res) => {
    const {id} = req.params;
    const newCustomer = req.body;
    req.getConnection((err, conn) => {

        conn.query('UPDATE customersT set ? where memberID = ?', [newCustomer, id], (err, rows) => {
            res.redirect('/');
        });
    });
};

controller.delete = (req, res) => {
    const {id} = req.params;
    req.getConnection((err, connection) => {
        connection.query('DELETE FROM customersT WHERE memberID = ?', [id], (err, rows) => {
            res.redirect('/');
        });
    });
}

function compareUser(passport, getUserByEmail, getUserById) {
    const authenticateUser = async (email, password, done) => {
        const user = getUserByEmail(email)
        if (user == null) {
            return done(null, false, {message: 'No user with that email'})
        }

        try {
            if (await bcrypt.compare(password, user.password)) {
                return done(null, user)
            } else {
                return done(null, false, {message: 'Password incorrect'})
            }
        } catch (e) {
            return done(e)
        }
    }

    passport.use(new LocalStrategy({usernameField: 'email'}, authenticateUser))
    passport.serializeUser((user, done) => done(null, user.id))
    passport.deserializeUser((id, done) => {
        return done(null, getUserById(id))
    })
}

module.exports = controller;
