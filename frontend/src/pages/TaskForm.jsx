import React, { useState } from 'react';
import { createTask } from '../api/taskApi';

const TaskForm = () => {
  const [name, setName] = useState('');
  const [dueDate, setDueDate] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    await createTask({ name, dueDate });
    alert('Task created successfully!');
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label>Task Name</label>
        <input
          type="text"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
      </div>
      <div>
        <label>Due Date</label>
        <input
          type="date"
          value={dueDate}
          onChange={(e) => setDueDate(e.target.value)}
        />
      </div>
      <button type="submit">Create Task</button>
    </form>
  );
};

export default TaskForm;
