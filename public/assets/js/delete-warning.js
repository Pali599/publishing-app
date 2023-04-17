function confirmDelete(event, url) {
    event.preventDefault();

    const confirmed = window.confirm("Are you sure you want to delete this item?");

    if (confirmed) {
      window.location.href = url;
    }
  }