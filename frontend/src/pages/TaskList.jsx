import React, { useEffect, useState } from 'react';
import { getTasks } from '../api/taskApi';

const TaskList = () => {
  const [tasks, setTasks] = useState([]);

  useEffect(() => {
    const fetchTasks = async () => {
      const data = await getTasks();
      setTasks(data);
    };
    fetchTasks();
  }, []);

  return (
    <div>
      <h1>Task List</h1>
      <ul>
        {tasks.map((task) => (
          <li key={task.id}>
            {task.name} - {new Date(task.dueDate).toLocaleDateString()}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default TaskList;
