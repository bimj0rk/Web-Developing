package com.wad.firstmvc.services;

import com.wad.firstmvc.domain.User;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class UserServiceImpl implements UserService {
    List<User> users = new ArrayList(List.of(
            new User(13L, "John", "john@gmail.com"),
            new User(15L, "Doe", "doe@gmail.com"),
            new User(19L, "Jane", "jane@gmail.com"))
    );


    @Override
    public List<User> findAll() {
        return users;
    }

    @Override
    public void save(User p) {
        users.add(p);
    }
}
