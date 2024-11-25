import React from 'react';
import { Link } from 'react-router-dom';
import './Header.css';

const Header = () => {
  return (
    <header className="header">
      <h1 className="header-title">Task Tracker</h1>
      <nav className="header-nav">
        <Link className="header-link" to="/">
          Home
        </Link>
        <Link className="header-link" to="/new">
          New Task
        </Link>
      </nav>
    </header>
  );
};

export default Header;
