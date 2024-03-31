package com.example.data.repositories;

import com.example.data.domain.CareProvider;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface CareProviderRepository extends CrudRepository<CareProvider,Long> {
    List<CareProvider> findAll(); // overrides findAll to return a List
}
