package com.example.data.repositories;

import com.example.data.domain.HealthIssue;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface HealthIssueRepository extends CrudRepository<HealthIssue,Long> {
    List<HealthIssue> findAll(); // overrides findAll to return a List
}
