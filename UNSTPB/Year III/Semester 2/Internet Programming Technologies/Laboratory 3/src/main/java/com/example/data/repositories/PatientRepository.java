package com.example.data.repositories;

import com.example.data.domain.Patient;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import java.util.List;
import java.time.LocalDate;

@Repository
public interface PatientRepository extends CrudRepository<Patient, Long> {
    @Query("SELECT DISTINCT p FROM Patient p JOIN p.medicalEncounters e WHERE e.date = :date")
    List<Patient> findAllWhoHadEncountersOnDate(@Param("date") LocalDate date);
}