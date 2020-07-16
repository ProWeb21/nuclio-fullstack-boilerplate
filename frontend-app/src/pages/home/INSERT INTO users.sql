INSERT INTO users (
      id,
      email,
      username,
      first_name,
      last_name,
      bio,
      email_verified_at,
      password,
      remember_token,
      created_at,
      updated_at
    )
  VALUES (
      null,
      'carlos@test.com',
      'carlos',
      'carlos',
      'perez',
      'hola',
      TIMESTAMP("2020-07-10"),
      'c0c010c0',
      'c0c010c0',
      TIMESTAMP("2020-07-10"),
      TIMESTAMP("2020-07-10")
    );