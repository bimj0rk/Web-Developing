package com.example.data.repositories;

import com.example.data.domain.Patient;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface PatientRepository extends CrudRepository<Patient,Long> {
    List<Patient> findAll(); // overrides findAll to return a List
}
