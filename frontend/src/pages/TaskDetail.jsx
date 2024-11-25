import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

const TaskDetail = () => {
  const { id } = useParams();
  const [task, setTask] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:8000/api/tasks/${id}`)
      .then((response) => response.json())
      .then((data) => setTask(data))
      .catch((error) => console.error('Error fetching task:', error));
  }, [id]);

  if (!task) return <div>Loading...</div>;

  return (
    <div>
      <h1>{task.name}</h1>
      <p>Due Date: {task.dueDate}</p>
    </div>
  );
};

export default TaskDetail;
