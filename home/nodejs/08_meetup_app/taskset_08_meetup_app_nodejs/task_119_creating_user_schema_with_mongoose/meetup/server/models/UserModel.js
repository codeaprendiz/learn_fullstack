const mongoose = require('mongoose');
const emailValidator = require('email-validator');

const UserSchema = mongoose.Schema({
  username: {
    type: String,
    required: true,
    trim: true,
    index: { unique: true },
    minlength: 3,
  },
  email: {
    type: String,
    required: true,
    trim: true,
    lowercase: true,
    index: { unique: true },
    validate: {
      validator: emailValidator.validate,
      message: props => `${props.value} is not a valid email address!`,
    },
  },
  password: {
    type: String,
    required: true,
    trim: true,
    index: { unique: true },
    minlength: 8,
  },
}, { timestamps: true });

module.exports = mongoose.model('User', UserSchema);
