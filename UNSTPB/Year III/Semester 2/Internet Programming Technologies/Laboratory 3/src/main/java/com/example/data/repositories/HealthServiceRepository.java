package com.example.data.repositories;

import com.example.data.domain.HealthService;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface HealthServiceRepository extends CrudRepository<HealthService,Long> {
    List<HealthService> findAll(); // overrides findAll to return a List
}
