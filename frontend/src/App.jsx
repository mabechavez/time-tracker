import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import TaskList from './pages/TaskList';
import TaskForm from './pages/TaskForm';
import TaskDetail from './pages/TaskDetail';

const App = () => (
  <Router>
    <Routes>
      <Route path="/" element={<TaskList />} />
      <Route path="/new" element={<TaskForm />} />
      <Route path="/task/:id" element={<TaskDetail />} />
    </Routes>
  </Router>
);

export default App;
