import React from 'react';
import './Button.css';

const Button = ({ label, onClick, style }) => {
  return (
    <button className="button" style={style} onClick={onClick}>
      {label}
    </button>
  );
};

export default Button;
